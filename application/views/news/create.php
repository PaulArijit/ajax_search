<h2><?php //echo $title; ?></h2>

<?php //echo validation_errors(); ?>
<?php echo base_url(); ?>

<form action="<?php echo base_url() ?>index.php/news/save_news" method="POST">

    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo (isset($data) ? $data['title'] : "") ?>" /><br />

    <label for="text">Text</label>
    <textarea name="text"><?php echo (isset($data) ? $data['text'] : "") ?></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>