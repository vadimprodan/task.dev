<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Validator;
use Storage;

class TemplateController extends Controller
{
    protected $model;
    protected $name;
    protected $name_plural;
    protected $entries = [];
    protected $actions = [];
    protected $allow_creating = true;
    protected $orderBy;
    protected $pagination = 15;
    protected $validation = [];
    protected $multipart = false;
    public $data = [];

    public function __construct()
    {
        $this->model = new $this->model;
        $this->name_plural = str_plural($this->name);
        $this->data['name'] = $this->name;
        $this->data['title'] = ucfirst($this->name_plural);
        $this->data['entries'] = $this->entries;
        $this->data['multipart'] = $this->multipart;
    }

    public function index()
    {
        $this->data['name_plural'] = $this->name_plural;
        $this->data['actions'] = $this->actions;
        $this->data['allow_creating'] = $this->allow_creating;
        $this->data['pagination'] = $this->pagination;

        $this->model = $this->beforeGet($this->model);
        if ($this->orderBy) {
            if (!is_array($this->orderBy)) {
                $column = $this->orderBy;
                $this->orderBy = [];
                $this->orderBy[0] = $column;
                $this->orderBy[1] = 'asc';
            }
            $this->model = $this->model->orderBy($this->orderBy[0], $this->orderBy[1]);
        }
        $this->data['items'] = ($this->pagination) ? $this->model->paginate($this->pagination) : $this->model->get();
        $this->data['items'] = $this->afterGet($this->data['items']);

        return view('admin.templates.index', $this->data);
    }

    public function form($id = null)
    {
        $this->formSetup();
        $this->data['item'] = ($id) ? $this->model->find($id) : null;
//        foreach ($this->data['entries'] as &$entry)
//        {
//            if ( isset($entry['model']) ) {
//                $entry['model'] = (new $entry['model'])->get();
//            }
//        } //TODO

        return view("admin.templates.form", $this->data);
    }

    public function action($id = null)
    {
        $method = strtolower( request()->method() );
        return $this->{$method}($id);
    }

    protected function get($id)
    {
        $this->itemSetup();
        $this->data['item'] = $this->model->find($id);

        return view('admin.templates.item', $this->data);
    }

    protected function post()
    {
        if (!$this->allow_creating) return response('Permission denied.', 401);
        $data = request()->all();

        $data = $this->postSetup($data);

        if ( is_array($this->validation) and !empty($this->validation) ) {
            $validator = Validator::make($data, $this->validation);

            if ( $validator->fails() ) return redirect()->back()->withErrors($validator)->withInput();
        }


        $this->model->create( $data );

        return redirect( route("admin.{$this->name_plural}") );
    }

    protected function put($id)
    {
        if (!in_array('edit', $this->actions)) return response('Permission denied.', 401);
        $data = request()->all();

        $item = $this->model->find($id);

        $data = $this->putSetup($item, $data);

        if ( is_array($this->validation) and !empty($this->validation) ) {
            $validator = Validator::make($data, $this->validation);

            if ( $validator->fails() ) return redirect()->back()->withErrors($validator)->withInput();
        }

        foreach ($data as $key => $value)
        {
            if ( isset($item->{$key}) && $item->{$key} != $value) $item->{$key} = $value;
        }

        $item->save();

        return redirect( route("admin.{$this->name_plural}") );
    }

    protected function delete($id)
    {
        if (!in_array('delete', $this->actions)) return response('Permission denied.', 401);
        $this->model->destroy($id);

        return redirect( route( "admin.{$this->name_plural}" ) );
    }

    protected function beforeGet($model)
    {
        return $model;
    }

    protected function afterGet($collection)
    {
        return $collection;
    }

    protected function postSetup($data)
    {
        return $data;
    }

    protected function putSetup($item, $data)
    {
        return $data;
    }

    protected function formSetup()
    {
    }

    protected function itemSetup()
    {
    }
}