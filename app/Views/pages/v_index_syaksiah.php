   <?= $this->extend('layout/master') ?>

   <?= $this->section('content') ?>
   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <div class="card border-left-primary shadow h-100 py-1 mb-4">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class=" text-primary mb-1">
                     <div class="d-flex align-items-center ">
                        <!-- <i class="fas fa-solid fa-file-invoice-dollar fa-2x text-gray-300 mr-3"></i> -->
                        <h5 class="h3 mb-0  " style="display: inline-block; margin-bottom: 0;">Manifast Syaksiah</h5>
                     </div>
                  </div>
               </div>
               <div class="col-auto">
                  <button type="button" class="mr-3 text-white btn btn-primary tombolTambah" data-toggle="modal" data-target="#viewModalClient">
                     <i class="fas fa-solid fa-plus"></i> Tambah Data
                  </button>
               </div>
            </div>
         </div>
      </div>

      <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
         </div>
         <div class="card-body viewDataClient">

         </div>
      </div>

      <div class="modal fade" id="viewModalClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title text-bold" id="exampleModalLabel">Tambah Client</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <?= form_open('SyaksiahController/simpanDataClient', ['class' => 'formTambahClient']) ?>
               <?= csrf_field(); ?>
               <div class="modal-body">
                  <div class="form-group">
                     <label for="nama_client_syaksiah">Nama Client</label>
                     <input type="text" name="nama_client_syaksiah" class="form-control" id="nama_client_syaksiah" aria-describedby="namaClient">
                     <div class="invalid-feedback error_nama_client_syaksiah">

                     </div>
                  </div>
                  <div class="form-group">
                     <label for="created_at">Tanggal Dibuat</label>
                     <input type="date" class="form-control" id="created_at" value="<?= htmlspecialchars(set_value('created_at', $created_at)) ?>" readonly>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-success" id="submitButton"><i class="fas fa-paper-plane"></i> Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
               <?= form_close(); ?>
            </div>
         </div>
      </div>

      <!-- Modal Edit Client -->
   <div class="modal fade" id="editModalClient" tabindex="-1" aria-labelledby="editModalClientLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-bold" id="editModalClientLabel">Edit Client</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <?= form_open('SyaksiahController/updateDataClient', ['class' => 'formEditClient']) ?>
               <?= csrf_field(); ?>
               <input type="hidden" name="edit_client_id" id="edit_client_id">
               <div class="form-group">
                  <label for="edit_nama_client_syaksiah">Nama Client</label>
                  <input type="text" name="edit_nama_client_syaksiah" class="form-control" id="edit_nama_client_syaksiah" aria-describedby="editNamaClient">
                  <div class="invalid-feedback error_edit_nama_client_syaksiah"></div>
               </div>
               <div class="form-group">
                  <label for="edit_created_at">Tanggal Dibuat</label>
                  <input type="date" class="form-control" id="edit_created_at" readonly>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary" id="editSubmitButton"><i class="fas fa-save"></i> Simpan Perubahan</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>
         </div>
      </div>
   </div>



   </div>
   <!-- /.container-fluid -->


   <?= $this->endSection() ?>