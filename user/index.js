
const logoutPopupBtn = document.querySelector('#logoutPopupBtn')
const logoutForm = document.querySelector('#logoutForm')
const logoutFormContainer = document.querySelector('#logoutForm .container')

const addAPhotoDesk = document.querySelector('#addAPhotoDesk')
const addAPhotoMobile = document.querySelector('#addAPhotoMobile')
const addNewPhotoForm = document.querySelector('#addNewPhotoForm')
const addNewPhotoFormContainer = document.querySelector('#addNewPhotoForm .container')


const deletePostForm = document.querySelector('#deletePostForm')
const deletePostFormContainer = document.querySelector('#deletePostForm .container')
const deletePostBtn = document.querySelector('#deletePostBtn')
document.addEventListener('click', function(event) {
   const outsideFormClick = !logoutFormContainer.contains(event.target);
   const outsideBtnClick = !logoutPopupBtn.contains(event.target);
   
   const outsideFormClick2 = !addNewPhotoFormContainer.contains(event.target);
   const outsideBtnClick2 = !addAPhotoMobile.contains(event.target);
   const outsideBtnClick3 = !addAPhotoDesk.contains(event.target);
   
   const outsideFormClick3 = !deletePostFormContainer.contains(event.target);
   const outsideBtnClick4 = !deletePostBtn.contains(event.target);

   if (addNewPhotoForm.style.display == 'grid' && outsideFormClick2 && outsideBtnClick2 && outsideBtnClick3) {
      addNewPhotoForm.style.display = 'none'
      window.location.href ='../index.php'
   }


   if (logoutForm.style.display == 'grid' && outsideFormClick && outsideBtnClick) {
      logoutForm.style.display = 'none'
      window.location.href ='../index.php'
   }

   if (deletePostForm.style.display == 'grid' && outsideFormClick3 && outsideBtnClick4) {
      deletePostForm.style.display = 'none'
      window.location.href ='../index.php'
   }
});



function logoutPopup() {
   logoutForm.style.display = 'grid'
}
function closeLogout(){
logoutForm.style.display = 'none'
      window.location.href ='../index.php'
}

function addPhotoPopup() {
   addNewPhotoForm.style.display = 'grid'
}
function closeAddPhoto(){
   addNewPhotoForm.style.display = 'none'
         window.location.href ='../index.php'
}

function closeDeletePost() {
   deletePostForm.style.display = 'none'
         window.location.href ='../index.php'
   
}
const icon = document.querySelectorAll('.likeBtn')

icon.forEach(i=>{
   let anim = 1
   let animation = lottie.loadAnimation({
      container: i,
      path: '../images/heart.json',
      renderer: 'svg',
      autoplay: false,
      loop: false
   })

   if (i.classList.contains('active')) {
      animation.setDirection(1)
      anim = 0
      animation.play()
   }

i.addEventListener('click', () => {
   if (anim === 1) {
      animation.setDirection(1)
      anim = 0
      animation.play()
   } else if (anim === 0) {
      animation.setDirection(-1)
      anim = 1
      animation.play()
   }
      })
})
        


function deletePost(id){
   deletePostForm.setAttribute('action', `../deletePost.php?id=${id}`)
   deletePostForm.style.display = 'grid'

}

function goTologinPage() {
   window.location.href = '../login?error=you must be logged in to be able to like posts&act=login';
}


const searchInput = document.querySelector('#searchInput')
const posts = document.querySelectorAll('.img')
console.log(posts);
searchInput.addEventListener('input', () => {
   posts.forEach(p => {
      let description = p.querySelector('.title').innerText.toLowerCase()
      let username = p.querySelector('.username').innerText.toLowerCase()
      if (description.includes(searchInput.value.toLowerCase()) || username.includes(searchInput.value.toLowerCase())) {
         p.style.display = 'block'
      } else {
         p.style.display = 'none'
      }
   });
})