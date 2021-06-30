var FBAppScript = document.createElement('script');
FBAppScript.setAttribute('src', 'https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js');
var FBInitScript = document.createElement('script');
FBInitScript.innerHTML = 'var event = document.createEvent(\'Event\');event.initEvent(\'FBinit\', true, true);var firebaseConfig = {apiKey:"AIzaSyBe6ooH-1rrcd8ui6ec7TtARe42Lh4iSO8",authDomain:"edge-srv.firebaseapp.com",projectId:"edge-srv",storageBucket:"edge-srv.appspot.com",messagingSenderId:"576813547971",appId:"1:576813547971:web:5e9aced002ed4fadd07d76",measurementId:"G-G8JKZYGM57"};firebase.initializeApp(firebaseConfig);document.dispatchEvent(event);';

document.body.append(FBAppScript);
document.body.append(FBAppScript);
document.addEventListener('FBinit', () => {
  console.log(firebase);
});
