
    const popup = document.querySelector('.popup');
    const close = document.querySelector('.close');

    window.onload = function(){
        setTimeout(function(){
            popup.style.display = "block"

            //Add some time delay to show popup
        }, 2000)
    }

    close.addEventListener('click', () => {
        popup.style.display = "none";
    })

    //Popup message
    document.querySelectorAll('.image-container .image img').forEach(image => {
        image.onclick = () => {
            const popupImage = document.querySelector('.popup-image');
            const popupImageContent = document.querySelector('.popup-image .popup-content');
            const description = image.nextElementSibling.textContent;

            popupImage.style.display = 'block';
            popupImageContent.querySelector('img').src = image.getAttribute('src');
            popupImageContent.querySelector('.popup-image-description').textContent = description;
            // document.querySelector('.topbar').style.display = 'none';
            document.querySelector('.fixed-top').style.display = 'none';
            // document.querySelector('.navbar-area.is-sticky').style.display = 'none';
        }
    });

    document.querySelector('.popup-image span').onclick = () => {
        const popupImage = document.querySelector('.popup-image');
        popupImage.style.display = 'none';
        // document.querySelector('.topbar').style.display = 'block';
        document.querySelector('.fixed-top').style.display = 'block';
        // document.querySelector('.navbar-area.is-sticky').style.display = 'block';
    }
