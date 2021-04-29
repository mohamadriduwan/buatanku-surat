<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php
    $uploadfile = $_FILES['fileidemis']['tmp_name'];

    require 'assets/PHPExcel/Classes/PHPExcel.php';
    require_once 'assets/PHPExcel/Classes/PHPExcel/IOFactory.php';

    $objExel = PHPExcel_IOFactory::load($uploadfile);

    echo '<table class="table-bordered" width="100%">
                <td width="10%">NIS</td>
                <td>IdEmis</td>
                </table>';
    foreach ($objExel->getWorksheetIterator() as $worksheet) {
        $highestrow = $worksheet->getHighestRow();
        for ($row = 2; $row < $highestrow; $row++) {

            echo '<table class="table-bordered" width="100%">
                <td width="10%">' . $nis = $worksheet->getCellByColumnAndRow(0, $row)->getValue() . '</td>
                <td>' . $idemis = $worksheet->getCellByColumnAndRow(1, $row)->getValue() . '</td>
                </table>';
        }
    }

    ?>
    <br>
    <input type="submit" class="btn btn-danger" name="importSubmit" value="IMPORT">
    <input type="submit" class="btn btn-success" name="cancel" value="CANCEL">





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->