var pag = document.getElementById('pag').value; //Obtenim la URL per comparar-la

var receptes = document.querySelectorAll('.guardadas_icon');

var base_url = 'http://comoencasa.cat/index.php?'; // Canviar projecte !=localhost
 //var base_url = 'http://localhost/projecte/index.php?'; // Canviar projecte !=localhost
var url = window.location.href;

if(url == pag) {
    var userid = $('#iduser').val();
    $.ajax({
        url: base_url + "controller=ControllerRecepta&action=mostrarLikes",
        type: 'post',
        data: { userid: userid }
    }).done(function (response) {
        var res = JSON.parse(response);
        //console.log(res);
        for(i=0;i<res.length;i++) {
            for(x=0;x<receptes.length;x++) {
                if(res[i].idrecepta == receptes[x].id) {
                    receptes[x].classList.add('like');
                    receptes[x].classList.remove('nolike');
                } 
            }
        }
    }).fail(function () {
        console.log("Error");
    });

    receptes.forEach((recepta) => {
        recepta.addEventListener("click", function (e) {
            var idrecepta = e.target.id;
            var res = e.target.classList.contains('like');
            if(res) {
                var param = 'deleteLike';
            } else {
                var param = 'addLike'; 
            }
            $.ajax({
                url: base_url + "controller=ControllerRecepta&action=gestionarLikes",
                type: 'post',
                data: { userid: userid, idrecepta: idrecepta, param:param }
            }).done(function () {
                if(param == 'deleteLike') {
                    e.target.classList.remove('like');
                    e.target.classList.add('nolike');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    
                    Toast.fire({
                        icon: 'success',
                        title: 'Eliminat de favoritos'
                    })
                } else if(param == 'addLike') {
                    e.target.classList.remove('nolike');
                    e.target.classList.add('like'); 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    
                    Toast.fire({
                        icon: 'success',
                        title: 'Afegit a favoritos'
                    })             
                }
            }).fail(function () {
                console.log("Error");                                                                               
            });
        });
    });
}
