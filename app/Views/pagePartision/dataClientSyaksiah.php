<div class="table-responsive">
   <table class="table table-bordered centered-table" id="dataTable" width="100%" cellspacing="0">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama Client</th>
            <th>Tanggal Dibuat</th>
            <th>Tanggal Diupdate</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php $count = 1 ?>
         <?php foreach ($client as $client) : ?>
            <tr>
               <td><?= $count++ ?></td>
               <td><?= esc($client->nama_client_syaksiah) ?></td>
               <td><?= esc($client->created_at) ?></td>
               <td><?= esc($client->updated_at) ?></td>
               <td>
                  <div class="d-flex justify-content-center">
                     <a href="#" class="btn btn-success btn-sm">
                        <i class="fas fa-info-circle"></i>
                     </a>
                     <button type="button" class="btn btn-warning btn-sm mx-2 editDataClient" data-toggle="modal" data-target="#editModalClient"  data-client-id="<?= $client->id_client_syaksiah ?>">
                        <i class="fas fa-edit"></i>
                     </button>
                     <a href="#" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                     </a>
                  </div>
               </td>
            </tr>
         <?php endforeach; ?>

      </tbody>
   </table>
</div>