<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Komentar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      
<!--   Ikon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<!--  </Akhir ikon   -->
      
  </head>
    
  <body>
      
<!--  Konten utama -->
      
      <div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6">
						<form method="post" id="form_komen">
							<div class="mb-3 animate-box">
								<label for="nama" class="form-label">Nama</label>
								<input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" autocomplete="off" required>
							</div>

							<div class="mb-3 animate-box">
								<label for="komentar" class="form-label">Komentar</label>
								<textarea class="form-control" id="komentar" name="komentar" rows="3" style="height: 100px;" required></textarea>
							</div>

							<input type="hidden" name="parent_id" id="parent_id" value="0" />
							<button type="submit" name="submit" id="submit" class="btn btn-danger btn-kirim mb-5 animate-box">Kirim</button>
						</form>

						<!-- Hasil komentar -->
						<div class="overflow-auto border border-2 pt-1 ps-1 mb-5" style="max-height: 400px; background-color:whitesmoke;">
							<div id="komentarPengguna"></div>
						</div>
						<!-- </Akhir hasil komentar -->
					</div>
				</div>
			</div>
      
            <div class="overflow-auto border border-2 pt-1 ps-1 mb-5" style="max-height: 400px; background-color:whitesmoke;">
							<div id="komentarPengguna">
                            
        <div class="card border border-1 p-3 mb-2 bg-white text-dark me-2" style="margin-left:30px;">
        <i class="bi bi-person-circle" style="font-size:30px;"> <span class="fst-normal fw-bold" style="font-size:19px;">dimas</span></i>
          <div class="card-body">
              <p>dakvdbakvbkajen,bbvaklhvnaehvnkaegvboi</p>
            </div>
            <div class="col-se-5 mt-5">
            <i class="bi bi-clock">2023-01-16 08:10:16</i> 
            <button type="button" class="btn btn-primary float-end reply" id="' . $row["id"] . '">Reply</button>
          </div>   
        </div>   

        <div class="card border border-1 p-3 mb-2 bg-white text-dark me-2" style="margin-left:30px;">
        <i class="bi bi-person-circle" style="font-size:30px;"> <span class="fst-normal fw-bold" style="font-size:19px;">dimas</span></i>
          <div class="card-body">
              <p>dakvdbakvbkajen,bbvaklhvnaehvnkaegvboi</p>
            </div>
            <div class="col-se-5 mt-5">
            <i class="bi bi-clock">2023-01-16 08:10:16</i> 
            <button type="button" class="btn btn-primary float-end reply" id="' . $row["id"] . '">Reply</button>
          </div>   
        </div>   
                            </div>
						</div>
        
            <!-- </Akhir konten utama-->
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      
<!--   Jquery 3.6.3-->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
      
<!--   Script jquery   -->
      <script>
          
      // ketika dokumen sudah siap
      $(document).ready(function(){
          
        // load function komentar ketika dokumen sudah siap
        loadKomentar();
          
         // ambil id form komen 
         $('#form_komen').on('submit', function(e) {
             
                /*  
                e.preventDefault() di sini di maksud kan agar data bisa di kirim ke server 
                tanpa refresh halaman menggunakan ajax nanti
                */
             
                e.preventDefault();

                // init ajax
                $.ajax({
                    
                    // set url
                    url: "tambah_komentar.php",
                    
                    // set method
                    method: "POST",
                    
                    // ambil semua data form
                    data: $(this).serialize(),
                    
                    // ketika sukses dan data berhasil masuk
                    success: function(response) {
                        
                        // load function komentar
                        loadKomentar();
                        
                        // reset form komen
                        $('#form_komen')[0].reset();
                        
                        // di bawah ini jika pengguna tidak membalas komentar pengguna lain
                        $('#parent_id').val('0');

                    }
                })
            });
          
          // untuk mendapatkan ID dari setiap pengguna dan membalas komentar
          $(document).on('click', '.reply', function () {
                let id = $(this).attr("id");
                $('#parent_id').val(id);
                $('#nama').focus();
          });
          
          
          // function load komentar
        //   function loadKomentar(){
              
        //       // init ajax
        //         $.ajax({
                    
        //             // set url
        //             url: "ambil_komentar.php",
                    
        //             // set method
        //             method: "GET",
                    
        //             // ketika data berhasil di GET
        //             success: function(response) {
                        
        //                // tampilkan pada tag div id komentar pengguna
        //                $('#komentarPengguna').html(response);
        //             }
        //         })
        //     }
      });
      </script>
  </body>
</html>