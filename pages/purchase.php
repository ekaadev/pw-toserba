<?php 

  // MEMANGGIL HEADER PHP => (SIDEBAR, NAVBAR)
  include('../components/head.php'); 
?>

  <div class="container-fluid">
    <div class="row min-vh-80 h-100 px-5 py-5">
      <div class="col-12">
        <p class="fs-2 mb-4">Purchase</p>
        
        <!-- input barang -->
        <div class="row d-flex flex-column rounded-2 bg-white shadow-sm border fs-5">
          <div class="border-bottom py-3">
            Input barang
          </div>
          <div class="sel-input col-12 d-flex gap-1 pt-3 pb-5 border-bottom">

            <!-- baris inputan  -->
            <div class="col-4">
              <div>
                <label for="idBarnag">ID Barang</label>
              </div>
              <input type="text" name="idBarang" class="form-control mt-2">
            </div>
            <div class="col-4">
              <div>
                <label for="kuantitasBarang">Kuantitas</label>
              </div>
              <input type="text" name="kuantitasBarang" class="form-control mt-2">
            </div>
            <div class="col-4">
              <div>
                <label for="jumlahBarang">Jumlah Barang</label>
              </div>
              <input type="text" name="jumlahBarang" class="form-control mt-2">
            </div>

          </div>

          <!-- submit -->
          <div class="py-2 d-flex justify-content-end ms-2">
            <input type="button" value="Submit" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>
  </div>


<?php 

  // MEMANGGIL FOOTER.PHP
  include('../components/scripts.php'); 
?>