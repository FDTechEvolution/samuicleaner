<div class="content container">
    <div class="row">

        <div class="col-md-3 md-margin-bottom-50 col-md-offset-1">
            <div class="responsive">
                <?php
                $profile = "user/user.jpg";
                $user = $maid->user;
                if ((!(is_null($user->image)) && $user->image != '')) {
                    $profile = '/uploads/images/' . $user->image->name;
                } elseif ((!(is_null($user->profile_image))) && $user->profile_image != '') {
                    $profile = $user->profile_image;
                }
                ?>
                <?= $this->Html->image($profile, ['class' => 'img-responsive profile-img margin-bottom-20']) ?> 
            </div>
        </div>
        <div class="col-md-8">
            <?= $this->Flash->render() ?>
            <div class="shop-product-heading">
                <h2><?= h($maid->user->firstname . '   ' . $maid->user->lastname) ?></h2>
            </div>
            <?php
            $rating = 0;
            foreach ($maid['comments'] as $comment) {
                $rating = $rating + $comment['rating'];
            }
            if(sizeof($maid['comments']) >0){
                $rating = round($rating / sizeof($maid['comments']));
            }
            ?>
            <ul class="list-inline product-ratings margin-bottom-30">
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <?php if ($i < $rating) { ?>
                        <li><i class="rating-selected fa fa-star"></i></li>
                    <?php } else { ?>
                        <li><i class="rating fa fa-star"></i></li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <p><?= h($maid->introduce) ?></p>
            <div class="tab-v1">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#comment" aria-expanded="true"><?= __('Comment by Customer') ?></a></li>
                    <li class=""><a data-toggle="tab" href="#addcomment" aria-expanded="false"><?= __('Add Comment') ?></a></li>
                </ul>
                <div class="tab-content">
                    <div id="comment" class="tab-pane fade active in">
                        <?php if (sizeof($maid['comments']) > 0) { ?>
                            <?php foreach ($maid['comments'] as $comment): ?>
                                <div class="col-md-12">
                                    <div class="col-md-2 ">
                                        <?= $this->Html->image('/assets/img/user.jpg', ['class' => 'rounded-x img-responsive']) ?>
                                    </div>
                                    <div class="col-md-10">
                                        <p><?= h($comment['description']) ?></p>
                                        <strong><?= h($comment['user']['firstname'] . '   ' . $comment['user']['lastname']) ?></strong>
                                        <p><?= h($comment['created']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php } else { ?>

                            <div class="text-center">
                                <?= __('- No Comment -') ?>
                            </div>
                        <?php } ?>

                    </div>
                    <div id="addcomment" class="tab-pane fade">
                        <?=
                        $this->Form->create('Comment', ['class' => 'sky-form', 'novalidate' => true,
                            'url' => ['controller' => 'maids', 'action' => 'comment', $maid->id]])
                        ?>
                        <fieldset>
                            <section>
                                <div class="rating">
                                    <?php for ($i = 5; $i >= 1; $i--) { ?>
                                        <input type="radio" id="<?= h('rating-' . $i) ?>" name="rating" value="<?= $i ?>">
                                        <label for="<?= h('rating-' . $i) ?>"><i class="fa fa-star"></i></label>
                                    <?php } ?>

                                    <?= __('Rating') ?>
                                </div>
                                <?= $this->Form->unlockField('rating') ?>
                            </section>
                            <section>
                                <label class="textarea">
                                    <?= $this->Form->textarea('description', ['label' => false]); ?>
                                </label>
                            </section>
                            <footer class="text-center">
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn-u']) ?>
                            </footer>

                        </fieldset>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>