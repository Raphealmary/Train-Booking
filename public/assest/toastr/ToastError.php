<?php if (!empty($msg)) { ?>
    <script>
        toastr["<?= $msg["type"] ?>"]("<?= $msg["text"] ?>");
    </script>
<?php } ?>