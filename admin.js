const updates = document.getElementsByClassName('update');
for (const update of updates) {

    
    update.addEventListener('click', async() => {
        const id = update.getAttribute('data-id');
        console.log(id);
        const response = await fetch(`api/getdata.php?id=${id}`);
        const json= await response.json(response);
        const data = json.data;
    

        Swal.fire({
            text: 'Modal with a custom image.',
            html:`
            <h2>Ubah Data Kandidat</h2>
            <form method="post" class="form" id="form-id" enctype="multipart/form-data">

                <input type="text" placeholder="id" name="id" class="form-control input" id='id' value='${data.id}' readonly>
                <input type="text" placeholder="nama" name="nama" class="form-control input" id='name' value='${data.nama}'>
                <input type="text" placeholder="skor" name="skor" class="form-control input" id='skor' value='${data.skor}'>
                </form>
                `,
            showCancelButton: true,
            confirmButtonColor: '#ffc107',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ubah',
            cancelButtonText: 'Batal',

            preConfirm: () => {
                const id = Swal.getPopup().querySelector('#id').value
                const nama = Swal.getPopup().querySelector('#name').value
                const skor = Swal.getPopup().querySelector('#skor').value

                if(!nama || !skor){
                    Swal.showValidationMessage("Tolong isi dengan lengkap")
                }
    
                return { id, nama, skor}
            }


        }).then(async (result)=>{
            if(result.value){
                const _=document.querySelector('#form-id');
                const form = new FormData(_);

                const res = await fetch (`api/update.php`, {
                    method: "POST",
                    body: form,

                })
                const datas= await res.json();
                if (datas.status == 'success') {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil ditambahkan',
                        icon: 'success',
                        preConfirm: () => {
                            window.location.reload();
                        } 
                    })
                }
               
            }

    
        })


    })
}