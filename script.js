
var modlog =  document.getElementById("login"); // deklarasi login modal
var modreg =  document.getElementById("register"); //deklarasi register modal


// function untuk munculin login dan register modal
function option(ids) {
    window.location.replace('edit-post.php?id='+ids);
}
function deletes(ids) {
    if (confirm('Are you sure you wanna delete this?') ==  true){
        window.location.replace('delete_post.php?id='+ids);
    }else{

    }
    
}

function modLog(){
    modlog.style.display='block';
}
function modReg(){
    modreg.style.display='block';
}

// agar ketika pencet diluar area card akan menutup card login dan register
window.onclick = function(event) {
    if (event.target == modlog) {
        modlog.style.display = "none";
    }
    if (event.target == modreg) {
        modreg.style.display = "none";
    }
    if (event.target == dropdownItem) {
        dropdownItem.style.display = "none";
    }
}

// function untuk alert ketika login dan register

function login(){
    var username = document.getElementById("usernamel").value;
    var pass = document.getElementById("passwordl").value;
    if (username == "" || pass == ""){
        alert("please fill every field correctly!");
    }else{
        alert("You are loged in as "+ username);
    }
}

function register(){
    var username = document.getElementById("usernamer").value;
    var mail = document.getElementById("mail").value;
    var pass = document.getElementById("passwordr").value;
    if (username == "" || pass == "" || mail == ""){
        alert("please fill every field correctly!");
    }else{
        alert("You are loged in as "+ username + ", and we've sent an email to verify your acount at "+mail);
    }
}


// // ARRAY OBJECT FOR POSTINGAN DI HOME
    
// const MyPost =
//  [
//     {
//         img   : "img/1.jpg",
//         prof  : "img/1p.jpg",
//         title : "My first Romance",
//         desc  : "This is the Story of me having the first romance",
//         page  : "detail-romance.html"
//     },
//     {
//         img   : "img/2.jpg",
//         prof  : "img/2p.jpg",
//         title : "My lovely Mini Moris",
//         desc  : "My lovely mini moris is always there for me",
//         page  : "detail-mini.html"
//     },
//     {
//         img   : "img/3.jpg",
//         prof  : "img/3.png",
//         title : "Mechanical Keyboard Hobby",
//         desc  : "Mechanical keyboard hobby is beeing so hyped",
//         page  : "detail-keyboard.html"
//     },
//     {
//         img   : "img/3.jpg",
//         prof  : "img/3.png",
//         title : "Mechanical Keyboard Hobby",
//         desc  : "Mechanical keyboard hobby is beeing so hyped",
//         page  : "detail-keyboard.html"
//     },
//     {
//         img   : "img/1.jpg",
//         prof  : "img/1p.jpg",
//         title : "My first Romance",
//         desc  : "This is the Story of me having the first romance",
//         page  : "detail-romance.html"
//     },
//     {
//         img   : "img/2.jpg",
//         prof  : "img/2p.jpg",
//         title : "My lovely Mini Moris",
//         desc  : "My lovely mini moris is always there for me",
//         page  : "detail-mini.html"
//     },
//     {
//         img   : "img/1.jpg",
//         prof  : "img/1p.jpg",
//         title : "My first Romance",
//         desc  : "This is the Story of me having the first romance",
//         page  : "detail-romance.html"
//     },
//     {
//         img   : "img/2.jpg",
//         prof  : "img/2p.jpg",
//         title : "My lovely Mini Moris",
//         desc  : "My lovely mini moris is always there for me",
//         page  : "detail-mini.html"
//     },
//     {
//         img   : "img/3.jpg",
//         prof  : "img/3.png",
//         title : "Mechanical Keyboard Hobby",
//         desc  : "Mechanical keyboard hobby is beeing so hyped",
//         page  : "detail-keyboard.html"
//     },
//     {
//         img   : "img/3.jpg",
//         prof  : "img/3.png",
//         title : "Mechanical Keyboard Hobby",
//         desc  : "Mechanical keyboard hobby is beeing so hyped",
//         page  : "detail-keyboard.html"
//     },
//     {
//         img   : "img/1.jpg",
//         prof  : "img/1p.jpg",
//         title : "My first Romance",
//         desc  : "This is the Story of me having the first romance",
//         page  : "detail-romance.html"
//     },
//     {
//         img   : "img/2.jpg",
//         prof  : "img/2p.jpg",
//         title : "My lovely Mini Moris",
//         desc  : "My lovely mini moris is always there for me",
//         page  : "detail-mini.html"
//     },
// ];

// // deklarasi element post section di home
// document.getElementById("post").innerHTML = MyPost.map(getPost).join("");

// // fungsi untuk  mereturn item card postingan
// function getPost(item) {
//     return`
//         <div class="column" id="post">
//                 <a href="${item.page}">
//                     <div class="card">
                    
//                         <div class="img">
//                             <img src="${item.img}" alt="">
//                         </div>
//                         <div class="profile">
//                             <img src="${item.prof}" alt="">
//                         </div>
//                         <div class="title">
//                             <h3>${item.title}</h3>
//                         </div>
//                         <div class="des">
//                             <p>${item.desc.substr(0,44)}...</p>
//                         </div>
//                     </div>
//                 </a>
//             </div>
//     `;
// }



// section untuk menampilkan image yang dipilih

function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("img");
      preview.src = src;
      preview.style.opacity = "1";
    }
}


function textAreaAdjust(element) {
    element.style.height = "1px";
    element.style.height = (25+element.scrollHeight)+"px";
  }