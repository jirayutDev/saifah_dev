const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

function showToast(icon, title, message) {
    Toast.fire({
        icon: icon,   // 'success' หรือ 'error'
        title: title, // หัวข้อ
        text: message // ข้อความ
    });
}