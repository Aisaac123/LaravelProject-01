document.getElementById('image_path').addEventListener('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById('imagePreview').src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
});

document.getElementById('title').addEventListener('input', function (e) {
    document.getElementById('textPreview').innerText = this.value;
});
document.getElementById('description').addEventListener('input', function (e) {
    document.getElementById('descPreview').innerText = this.value;
});

