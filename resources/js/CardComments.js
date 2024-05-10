var commentIcons = document.querySelectorAll('.comment-icon');
var commentBoxes = document.querySelectorAll('.animated-comment-box');
var overlay = document.getElementById('overlay');

commentIcons.forEach(function(commentIcon, index) {
    commentIcon.addEventListener('click', function() {
        var commentBox = commentBoxes[index];
        if (commentBox.style.transform === 'translateY(0%)') {
            commentBox.style.transform = 'translateY(100%)';
            overlay.style.backgroundColor = 'rgba(0,0,0,0)';
            setTimeout(function() {
                overlay.style.display = 'none';
            }, 300);
        } else {
            commentBox.style.transform = 'translateY(0%)';
            overlay.style.display = 'block';
            setTimeout(function() {
                overlay.style.backgroundColor = 'rgba(0,0,0,0.5)';
            }, 10);

            overlay.addEventListener('click', function() {
                commentBox.style.transform = 'translateY(100%)';
                overlay.style.backgroundColor = 'rgba(0,0,0,0)';
                setTimeout(function() {
                    overlay.style.display = 'none';
                }, 300);
            });
        }
    });
});

commentBoxes.forEach(function(commentBoxes, index){
    commentBoxes.addEventListener('click', function() {
        document.getElementById('animated-comment-box').style.transform = 'translateY(100%)';
        document.getElementById('overlay').style.backgroundColor = 'rgba(0,0,0,0)';
        setTimeout(function () {
            document.getElementById('overlay').style.display = 'none';
        }, 300);
    })
});
