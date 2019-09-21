function fileValidation(obj) {
    //var fileInput = document.getElementById('file'+id);
    var filePath = obj.value; //lấy giá trị input theo id
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
    //Kiểm tra định dạng
    if (!allowedExtensions.exec(filePath)) {
        alert('You can only select files with .jpeg/.jpg/.png/.gif extension.');
        obj.value = '';
        return false;
    } else {
        //Image preview
        if (obj.files && obj.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('imagePreview'+obj.id).innerHTML = '<img style="width:200px;" src="' + e.target.result + '"/>';
            };
            reader.readAsDataURL(obj.files[0]);
        }
    }
}