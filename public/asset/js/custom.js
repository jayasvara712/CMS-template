//menu
function menu(e){
    $('#'+e).addClass('active');   
}

//slugify
function urlmaker(){
    let judul = document.getElementById("judul");
    let url = document.getElementById("url");
    url.value = judul.value.toLowerCase().replace(" ", "-");
}

//preview single image 
function imagePreview(){
    const gambar = document.querySelector('#gambar')
    const label = document.querySelector('.gambar-label')
    const imgPrev = document.querySelector('.img-preview')
    if(label){
        label.textContent = gambar.files[0].name
    }
    const fileImage = new FileReader()
   fileImage.readAsDataURL(gambar.files[0])

    fileImage.onload = function(e){
        imgPrev.src = e.target.result
    }
}

//button add imaage
// function addMoreImage() {
//     let imageIklan = document.getElementsByClassName('image-iklan')[0]
//     let div = document.createElement('div')
//     div.classList.add('col-1')
//     div.classList.add('m-2')
//     let defaultImage = '/uploads/iklan/prongiklan-addimage.png';
//     let newButton = ` 
//     <label for="image" class="dashboard__label__gambar"><img src="/uploads/iklan/prongiklan-addimage.png" alt="" srcset="" width="100px"></label>
//     <input type="file" name="gambar[]" id="image" class="dashboard__input__gambar">
//     `
//     div.innerHTML = newButton;
//     imageIklan.append(div);
// }

// document.addEventListener('DOMContentLoaded', function() {
// let inputDashboard = document.getElementsByClassName('dashboard__input__gambar')
// //folder
// let pathImage = '/uploads/iklan/'
// //nama gambar
// let defaultIklan = 'prongiklan-addimage.png'
// let noImage = 'no-image.png'  
// let defaultImage = pathImage.concat(defaultIklan)
// let showImage = document.getElementsByClassName('dashboard__show__gambar')
// for (let i = 0; i < showImage.length; i++) {
//     let parentShowImage = showImage[i].parentElement
    
//     if (showImage[i].alt != defaultIklan && showImage[i].alt ) {
      
//         let createSpan = document.createElement('span')
//         createSpan.classList.add('delete__image__iklan')
//         parentShowImage.getElementsByTagName("span")
//         parentShowImage.parentElement.append(createSpan)
           
//             let getDelete  = parentShowImage.parentElement.getElementsByClassName('delete__image__iklan')
//             for (let i = 0; i < getDelete.length; i++) {
                
//                 getDelete[i].addEventListener("click",(e)=>{
//                 let getimg = e.target.parentElement
//                 let tmp = getimg.getElementsByClassName('old-image')
//                 let getsrc = getimg.getElementsByClassName('dashboard__show__gambar')
//                 //ubah hidden input gambar lama ke no-image
//                 tmp[0].value = noImage
//                 getsrc[0].src = defaultImage
//                 getDelete[0].remove()
//             })
//             }
//     }
  
// }
// for (let i = 0; i < inputDashboard.length; i++) {
//     inputDashboard[i].addEventListener("change",function(e) {
//         let getInput = e.target
//         let getParent = getInput.parentElement
//         let getImage =getParent.getElementsByClassName('dashboard__show__gambar')[0]
//         let createSpan = document.createElement('span')
//         createSpan.classList.add('delete__image__iklan')
//         getParent.getElementsByTagName("span")
//         getParent.append(createSpan)
//          const fileImage = new FileReader()
       
//          fileImage.onload = function(event){
//             getImage.src = event.target.result
//             let tmp = getParent.getElementsByClassName('old-image')[0]
            
//             tmp.value = getInput.files[0].name
//             let getDelete  = getParent.getElementsByClassName('delete__image__iklan')[0]
//             getDelete.addEventListener("click",(e)=>{
//                 tmp.value = noImage
//                 getImage.alt = ""
//                 getImage.src = defaultImage;
//                 getInput.value = ""
//                 getDelete.remove()
//             })
//          }
//          fileImage.readAsDataURL(getInput.files[0])
//     })
// }
// }, false);

