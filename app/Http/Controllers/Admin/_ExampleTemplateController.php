<?php
/**
 * Example controller for my templates.
 * Also is small documentation =)
 */

namespace App\Http\Controllers\Admin;

class _ExampleTemplateController extends TemplateController
{
    /**
     * Set model to template.
     * @var string $model
     */
    protected $model;
    /**
     * Set name template (in singular).
     * @var string $name
     */
    protected $name;
    /**
     * Entries to show in index and form.
     * @var array $entries
     *  Example:
     *  [
     *      'column_name' => [
     *          'name' => 'Showed name',
     *          'type' => 'type_name', // Types find in resources/views/admin/templates/inputs.
     *          'hidden' => true, // Set hidden on index page. If you want set hidden on form page don't set `type`.
     *          'required' => true, // Set required to input.
     *          'some_other' => [], // $some_other be visible on input view (`resources/views/admin/templates/inputs`)
     * ]
     */
    protected $entries = [];
    /**
     * Allow actions array.
     *  Actions find in resources/views/admin/templates/actions.
     * @var array $actions
     */
    protected $actions = [];
    /**
     * Allow/disallow creating items.
     *  Default: true
     * @var bool $allow_creating
     */
    protected $allow_creating = true;
    /**
     * Set order by.
     *  Example:
     *      Array => ['created_at', 'desc'] or String => 'created_at'
     *  Default sort: asc
     * @var string|array $orderBy
     */
    protected $orderBy;
    /**
     * Set pagination to index page (default: 15).
     *  To turn off set `false`.
     * @var int|bool $pagination
     */
    protected $pagination = 15;
    /**
     * Set validation rules array.
     * @var array $validation
     */
    protected $validation = [];
    /**
     * Set multipart data in form.
     * @var bool $multipart
     */
    protected $multipart = false;

    /**
     * Customize model before get.
     *  Example:
     *      return $model->select('some');
     * @param $model
     */
    protected function beforeGet($model)
    {
        return $model;
    }

    /**
     * Customize model after get.
     *  Example:
     *      return $model->setHidden(['some']);
     * @param $collection
     */
    protected function afterGet($collection)
    {
        return $collection;
    }

    /**
     * Customize request()->all() array on post request.
     *
     * @param array $data
     * @return array
     */
    protected function postSetup($data)
    {
        return $data;
    }

    /**
     * Customize request()->all() array on put request.
     *
     * @param collection $item
     * @param array $data
     * @return array
     */
    protected function putSetup($item, $data)
    {
        return $data;
    }

    /**
     * Execute when before render form page.
     */
    protected function formSetup()
    {
    }

    /**
     * Execute when before render item page.
     */
    protected function itemSetup()
    {
    }
}