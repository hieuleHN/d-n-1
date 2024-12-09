// let slideIndex = 1;
// showSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   let i;
//   let slides = document.getElementsByClassName("mySlides");
//   let dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
// }
//    AUTO
  let slideIndex = 0;
  showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

// hiệu ứng danh mục



// const addCartToHTML = () => {
//   listCartHTML.innerHTML = '';
//   let totalQuantity = 0;
//   if(cart.length > 0){
//       cart.forEach(item => {
//           totalQuantity = totalQuantity +  item.quantity;
//           let newItem = document.createElement('div');
//           newItem.classList.add('item');
//           newItem.dataset.id = item.product_id;

//           let positionProduct = products.findIndex((value) => value.id == item.product_id);
//           let info = products[positionProduct];
//           listCartHTML.appendChild(newItem);
//           newItem.innerHTML = `
//           <div class="image">
//                   <img src="${info.image}">
//               </div>
//               <div class="name">
//               ${info.name}
//               </div>
//               <div class="totalPrice">$${info.price * item.quantity}</div>
//               <div class="quantity">
//                   <span class="minus"><</span>
//                   <span>${item.quantity}</span>
//                   <span class="plus">></span>
//               </div>
//           `;
//       })
//   }
//   iconCartSpan.innerText = totalQuantity;
// }
