document.addEventListener('livewire:navigated' , function(){
    jQuery(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            nav: true,
            margin: 10,
            navText: ["<img src='http://127.0.0.1:8000/Assets/images/Icons/LeftArrow.svg'>", "<img src='http://127.0.0.1:8000/Assets/images/Icons/RightArrow.svg'>"],
        
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                960: {
                    items: 5
                },
                1200: {
                    items: 10
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY > 0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
      });
});







$(document).ready(function () {            // on document ready
    checkitemCard();
    checkitemUserModal();
    checkitemUserModalForPosts();
});

$('#carouselExampleControls').on('slid.bs.carousel', checkitemCard);

function checkitemCard()                        // check function
{
    var $this = $('#carouselExampleControls');
    if ($('.card-img-top .carousel-inner .carousel-item:first').hasClass('active')) {
        // Hide left arrow
        $this.children('.carousel-control-prev').hide();


        // But show right arrow
        $this.children('.carousel-control-next').show();
    } else if ($('.card-img-top .carousel-inner .carousel-item:last').hasClass('active')) {
        // Hide right arrow
        console.log('right arrow');
        $this.children('.carousel-control-next').hide();

        // But show left arrow
        $this.children('.carousel-control-prev').show();
    } else {

        $this.children('.carousel-control-prev').show();
        $this.children('.carousel-control-next').show();
    }
}

$('#carouselExampleControls2').on('slid.bs.carousel', checkitemUserModal);
function checkitemUserModal()                        // check function
{
    var $this = $('#carouselExampleControls2');
    if ($('.review-section .carousel-inner .carousel-item:first').hasClass('active')) {
        // Hide left arrow
        $this.children('.carousel-control-prev-2').toggleClass("carousel-btn-disabled");
        // But show right arrow
        $this.children('.carousel-control-next-2').removeClass("carousel-btn-disabled");
    } else if ($('.carousel-inner .carousel-item:first').hasClass('active')) {
        console.log('right arrow');
        // Hide right arrow
        $this.children('.carousel-control-next-2').toggleClass("carousel-btn-disabled");

        // But show left arrow
        $this.children('.carousel-control-prev-2').removeClass("carousel-btn-disabled");
    } else {

        $this.children('.carousel-control-prev-2').removeClass("carousel-btn-disabled");
        $this.children('.carousel-control-next-2').removeClass("carousel-btn-disabled");
    }
}

$('#carouselExampleControls3').on('slid.bs.carousel', checkitemUserModalForPosts);
function checkitemUserModalForPosts()                        // check function
{
    var $this = $('#carouselExampleControls3');
    if ($('.carousel-inner2 .carousel-item2:first').hasClass('active')) {
        // Hide left arrow
        $this.children('.carousel-control-prev-2').toggleClass("carousel-btn-disabled");
        // But show right arrow
        $this.children('.carousel-control-next-2').removeClass("carousel-btn-disabled");
    } else if ($('.carousel-inner2 .carousel-item2:first').hasClass('active')) {
        console.log('right arrow');
        // Hide right arrow
        $this.children('.carousel-control-next-2').toggleClass("carousel-btn-disabled");

        // But show left arrow
        $this.children('.carousel-control-prev-2').removeClass("carousel-btn-disabled");
    } else {

        $this.children('.carousel-control-prev-2').removeClass("carousel-btn-disabled");
        $this.children('.carousel-control-next-2').removeClass("carousel-btn-disabled");
    }
}



try {
    // const CloseButtonHolder = document.getElementById('close-modal');
    var UserCodalContent = document.getElementById('user-details-holder');
    var CloseModal = document.getElementById('close-modal');

    const sectionOne = document.querySelector(".user-public-info");

    
    const seactionOneOptions = {};
    const sectionOneObserver = new IntersectionObserver(function (entries, sectionOneObserver) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                CloseModal.style.backgroundColor = 'white';
                UserCodalContent.style.backgroundColor = 'white';
                CloseModal.style.transition = "all 0.5s";
                UserCodalContent.style.transition = "all 0.5s";
            } else {
                CloseModal.style.backgroundColor = 'var(--user-modal-color)';
                UserCodalContent.style.backgroundColor = 'var(--user-modal-color)';
                CloseModal.style.transition = "all 0.5s";
                UserCodalContent.style.transition = "all 0.5s";
            }
        });
    }, seactionOneOptions);

    sectionOneObserver.observe(sectionOne);

} catch (error) {

}


try {
    // const CloseButtonHolder = document.getElementById('close-modal');
    var ShowNavOnScroll = document.getElementById('show-on-scroll-nav');
    const sectionOne = document.querySelector(".house-details-information");
    
    const seactionOneOptions = {};
    const sectionOneObserver = new IntersectionObserver(function (entries, sectionOneObserver) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                ShowNavOnScroll.style.display="none";
            } else {
                ShowNavOnScroll.style.display="block";
            }
            
        });
        
    }, seactionOneOptions);

    sectionOneObserver.observe(sectionOne);
} catch (error) {

}



// document.addEventListener('DOMContentLoaded', function () {
//     let dateTimeFrom = document.getElementById('DateFrom');
//     let dateTimeTo = document.getElementById('DateTo');
//     let dateTimeToPicker = null;

//     // from
//     let dateTimeFromPicker = flatpickr(dateTimeFrom, {
//         dateFormat: 'Y/m/d',
//         minDate: "today",
//         onChange: function (selectedDates, dateStr, instance) {
//             dateTimeToPicker.set('minDate', selectedDates[0]);
//         }
//     });

//     // To
//     dateTimeToPicker = flatpickr(dateTimeTo, {
//         dateFormat: 'Y/m/d',
//         minDate: "today",
//         onChange: function (selectedDates, dateStr, instance) {
//             dateTimeFromPicker.set('maxDate', selectedDates[1]);
//         }
//     });

// });
try {
    // flatpickr('#DateFrom', {
    //     allowInput: true,
    //     dateFormat: 'Y/m/d',
    //     minDate: "today",
    //     defaultDate: ["today"],
    //     "plugins":  [new rangePlugin( { input: "#DateTo" })],
    // });

    flatpickr('#DateFrom', {
        allowInput: true,
        dateFormat: 'Y/m/d',
        minDate: "today",
        defaultDate: ["today"],
        onChange: function(sel_date, date_str) {
            end_date.set("minDate", date_str);
        }
    });

    const end_date = flatpickr('#DateTo', {
        allowInput: true,
        dateFormat: 'Y/m/d',
        minDate: "today",
    });
} catch (error) {

}

try {
    var navbarNav = document.getElementById('nonCollapseNav');
    var nonCollapseFilter = document.getElementById('nonCollapseFilter');
    var searchBtn = document.getElementById('searchBtn');
    var textTap = document.createElement('p');
    var textValue = document.createTextNode('Search');

    navbarNav.addEventListener('click', function () {
        navbarNav.classList.add('nonCollapse');
        nonCollapseFilter.classList.add('nonCollapseFilter');
        if (searchBtn.querySelector(".search")) {
        } else {
            textTap.appendChild(textValue);
            searchBtn.appendChild(textTap);
            textTap.classList.add('search');
            textTap.classList.add('ms-2');
        }
        if (!navbarNav.contains(event.target)) {
            navbarNav.classList.remove('nonCollapse');
            nonCollapseFilter.classList.remove('nonCollapseFilter');
        }
    });

} catch (error) {

}

try {
    document.addEventListener('click', function handleClickOutsideBox(event) {
        var navbarNav = document.getElementById('nonCollapseNav');

        try {
            if (!navbarNav.contains(event.target)) {
                navbarNav.classList.remove('nonCollapse');
                nonCollapseFilter.classList.remove('nonCollapseFilter');
                textTap.classList.remove('search');
                textTap.classList.remove('ms-2');
                textTap.remove();
            } else {
            }
        } catch (error) {

        }

    });
} catch (error) {

}


try {

    let rangeMin = 100;
    const range = document.querySelector(".range-selected");
    const rangeInput = document.querySelectorAll(".range-input input");
    const rangePrice = document.querySelectorAll(".range-price input");

    rangeInput.forEach((input) => {
        input.addEventListener("input", (e) => {
          let minRange = parseInt(rangeInput[0].value);
          let maxRange = parseInt(rangeInput[1].value);
          if (maxRange - minRange < rangeMin) {     
            if (e.target.className === "min") {
              rangeInput[0].value = maxRange - rangeMin;      
            } else {
              rangeInput[1].value = minRange + rangeMin;        
              
            }
          } else {
            rangePrice[0].value = minRange;
            rangePrice[1].value = maxRange;
            range.style.left = (minRange / rangeInput[0].max) * 100 + "%";
            range.style.right = 100 - (maxRange / rangeInput[1].max) * 100 + "%";
          }
        });
      });
      rangePrice.forEach((input) => {
        input.addEventListener("input", (e) => {
          let minPrice = rangePrice[0].value;
          let maxPrice = rangePrice[1].value;
          if (maxPrice - minPrice >= rangeMin && maxPrice <= rangeInput[1].max) {
            if (e.target.className === "min") {
              rangeInput[0].value = minPrice;
              range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
            } else {
              rangeInput[1].value = maxPrice;
              range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
          }
        });
      });

//     const rangeInput = document.querySelectorAll(".range-input input"),
//   priceInput = document.querySelectorAll(".price-input input"),
//   range = document.querySelector(".slider-price .progress");
// let priceGap = 1000;

// priceInput.forEach((input) => {
//   input.addEventListener("input", (e) => {
//     let minPrice = parseInt(priceInput[0].value),
//       maxPrice = parseInt(priceInput[1].value);

//     if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
//       if (e.target.className === "input-min") {
//         rangeInput[0].value = minPrice;
//         range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
//       } else {
//         rangeInput[1].value = maxPrice;
//         range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
//       }
//     }
//   });
// });

// rangeInput.forEach((input) => {
//   input.addEventListener("input", (e) => {
//     let minVal = parseInt(rangeInput[0].value),
//       maxVal = parseInt(rangeInput[1].value);

//     if (maxVal - minVal < priceGap) {
//       if (e.target.className === "range-min") {
//         rangeInput[0].value = maxVal - priceGap;
//       } else {
//         rangeInput[1].value = minVal + priceGap;
//       }
//     } else {
//       priceInput[0].value = minVal;
//       priceInput[1].value = maxVal;
//       range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
//       range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
//     }
//   });
// });

} catch (error) {
    
}


// function totalClick(click) {
//     const Total_guest_value = 16;
//     var guest_field = document.getElementById('guest_field');
//     if(guest_field.value == Total_guest_value){
//         console.log('capped');
//         guest_field.value = Total_guest_value;
//         console.log(guest_field.value);
//     }else{
//         guest_field.value++;
//     }
// }



// @script
// <script>
//     console.log($wire.category_selected);
//     document.getElementById('increment_guest_btn').addEventListener('click' , function(){
//         $wire.category_selected = '23';
        
//     });
// </script>
// @endscript

