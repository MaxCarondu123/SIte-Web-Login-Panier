<?php
    session_start();
    require_once 'classes/db.classe.php';
    
    $DB = new DB();
?>

        <?php  include 'include/head.php'?> 

        <?php include 'include/navigation.php' ?>

        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">Membres</h2>
                        </div>  

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>level</th>
                                    <th>Action</th>                
                                </tr>
                            </thead>
                            <?php $users = $DB->queryObj('SELECT * FROM users'); ?>
                            <?php foreach($users as $user): ?>
                            <tbody>
                                <tr>
                                    <td><?= $user->id; ?></td>
                                    <td><?= $user->nom; ?></td>
                                    <td><?= $user->level; ?></td>
                                    <td>
                
                                    </td>
                                </tr>
                            </tbody>
                            <?php endforeach ?>  
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php include 'include/footer.php'?> 