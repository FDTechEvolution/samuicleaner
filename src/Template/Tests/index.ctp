<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title></title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?= $this->Html->css('/assets/plugins/bootstrap/css/bootstrap.min.css') ?>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <?= $this->Html->link($this->Html->image('logo/samui_cleaner.png', ['width' => '170']), '', ['' => '', 'class' => 'logo', 'escape' => false]); ?>
                    <hr>
                    <div class="row">
                        <h2>God Morning</h2>
                    </div>
                    <hr>
                    <footer>
                        <p>© 2016 Company, Inc.</p>
                    </footer>
                </div>
            </div>

        </div>
    </body>
</html>