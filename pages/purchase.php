<?php 

  // MEMANGGIL HEADER PHP => (SIDEBAR, NAVBAR)
  include('../components/head.php'); 
?>

  <div class="container-fluid">
    <div class="row min-vh-80 h-100 px-5 py-5">
      <div class="col-12">
        <p class="fs-2 mb-4">Purchase</p>
        
        <!-- input barang -->
        <form action="">

          <div class="row d-flex flex-column rounded-2 bg-white shadow-sm border fs-5">
            <div class="border-bottom py-3">
              Input barang
            </div>
            <div class="sel-input col pt-3 pb-5 border-bottom">
              <div class="row">
              
                <!-- baris inputan  -->
                <div class="col-md-4">
                  <label for="idBarnag">ID Barang</label>
                  <input type="text" name="idBarang" class="form-control">
                </div>
                <div class="col-md-4">
                  <label for="kuantitasBarang">Kuantitas</label>
                  <input type="text" name="kuantitasBarang" class="form-control">
                </div>
                <div class="col-md-4">
                  <label for="jumlahBarang">Jumlah Barang</label>
                  <input type="text" name="jumlahBarang" class="form-control">
                </div>
                
              </div>

            </div>

            <!-- submit -->
            <div class="py-2 d-flex justify-content-end">
              <input type="button" value="Submit" class="btn btn-primary">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>


<?php 

  // MEMANGGIL FOOTER.PHP
  include('../components/scripts.php'); 
?>