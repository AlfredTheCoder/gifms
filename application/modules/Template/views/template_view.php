<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="GIFMS,CHAI,FINANCE,DONOR,KENYA">
    <meta name="author" content="CHAI">
    <title><?php echo $page_title; ?></title> <!-- Title -->
    <?php $this->load->view('styles_view'); ?> <!-- CSS -->
</head>
<body>
    <div id="wrapper">
        <?php $this->load->view('menu_view'); ?> <!-- Menu -->
        <?php $this->load->view($content_view); ?> <!-- Content -->
    </div>
    <!-- /#wrapper -->
    <?php $this->load->view('scripts_view'); ?> <!-- JS -->
</body>
</html>