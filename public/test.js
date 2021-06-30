var FBAppScript = document.createElement('script');
FBAppScript.setAttribute('src', 'https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js');
var FBAuthScript = document.createElement('script');
FBAuthScript.setAttribute('src', 'https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js');
var FBFSScript = document.createElement('script');
FBFSScript.setAttribute('src', 'https://www.gstatic.com/firebasejs/8.6.8/firebase-firestore.js');

document.body.append(FBAppScript);
document.body.append(FBAuthScript);
document.body.append(FBFSScript);

var loadingID = setInterval(() => {
  if (window.firebase && firebase.auth && firebase.firestore) {
    firebase.initializeApp({
      apiKey: "AIzaSyBe6ooH-1rrcd8ui6ec7TtARe42Lh4iSO8",
      authDomain: "edge-srv.firebaseapp.com",
      projectId: "edge-srv",
      storageBucket: "edge-srv.appspot.com",
      messagingSenderId: "576813547971",
      appId: "1:576813547971:web:5e9aced002ed4fadd07d76",
      measurementId: "G-G8JKZYGM57"
    });
    firebase.auth().signInAnonymously().then(onInitialized);
    clearInterval(loadingID);
  }
}, 100);

function onInitialized() {
  console.log(1111);
}
