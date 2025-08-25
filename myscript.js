							/** ------------- START OF FIRST CONTAINER ----------------- **/
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		showSlides(slideIndex = n);
		}

		function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		if (n > slides.length) {slideIndex = 1}    
		if (n < 1) {slideIndex = slides.length}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
			}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " active";
			}
/* ----------------------------------------- END OF FIRST CONTAINER ------------------------------------- */

							/**------------- START OF SECOND CONTAINER ----------------- **/

	    const items = document.querySelectorAll('.accordion-item');
	    const contentDisplays = document.querySelectorAll('.content-display-content');

	    items.forEach(item => {
	        item.addEventListener('click', () => {
	            const isActive = item.classList.contains('active');
	            items.forEach(i => i.classList.remove('active'));
	            contentDisplays.forEach(content => content.classList.remove('active'));

	            if (!isActive) {
	                item.classList.add('active');
	                document.getElementById(item.getAttribute('data-content')).classList.add('active');
	            }
	        });
	    });
/* ----------------------------------------- END OF SECOND CONTAINER ------------------------------------ */

							/* ------------- START OF THIRD CONTAINER ----------------- */
        const questionItems = document.querySelectorAll('.question-item');

        questionItems.forEach(item => {
            const title = item.querySelector('.question-title');
            title.addEventListener('click', () => {
                const openItem = document.querySelector('.question-item.open');
                if (openItem && openItem !== item) {
                    openItem.classList.remove('open');
                    openItem.querySelector('.question-answer').style.maxHeight = null;
                    openItem.querySelector('span').innerHTML = '&#x25BC;';
                }

                item.classList.toggle('open');
                const answer = item.querySelector('.question-answer');
                if (item.classList.contains('open')) {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                    title.querySelector('span').innerHTML = '&#x25B2;';
                } else {
                    answer.style.maxHeight = null;
                    title.querySelector('span').innerHTML = '&#x25BC;';
                }
            });
        });
/* ----------------------------------------- END OF THIRD CONTAINER --------------------------------------*/


							/* ------------- START OF FOURTH CONTAINER ----------------- */
        										/* no javascript */
/* ----------------------------------------- END OF FOURTH CONTAINER -------------------------------------*/
											   

							/* ------------- START OF FIFTH CONTAINER ----------------- */
	document.addEventListener("DOMContentLoaded", function() {
    const boxes = document.querySelectorAll('.content-box');

    function showBoxes() {
        const triggerBottom = window.innerHeight / 5 * 4;

        boxes.forEach(box => {
            const boxTop = box.getBoundingClientRect().top;

            if (boxTop < triggerBottom) {
                box.classList.add('visible');
            }
        });
    }

    window.addEventListener('scroll', showBoxes);
    showBoxes(); // Trigger on load
});
/* ----------------------------------------- END OF FIFTH CONTAINER --------------------------------------*/


							/* ------------- START OF SIX CONTAINER ----------------- */
											   /* no javascript */
/* ----------------------------------------- END OF FIFTH CONTAINER --------------------------------------*/