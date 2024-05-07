var images = document.getElementsByClassName('like');
for (var i = 0; i < images.length; i++) {
    images[i].addEventListener('click', function() {
        if (this.src.match("no-like-icon.png")) {
            this.src = "/shared/like-icon.png";
        } else {
            this.src = "/shared/no-like-icon.png";
        }
    });
}
