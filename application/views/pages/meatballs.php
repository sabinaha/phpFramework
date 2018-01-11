<section>
    <!-- Printar all xml beroende på titel -->
    <?php print_xml (lcfirst($title)); ?>
    <!-- Comment section -->
    <div class="right">
        <div class="comments">
            <?php if($this->session->userdata('logged_in')) : ?>
            <?php echo validation_errors(); ?>
            <?php echo form_open('comments/create'); ?>
            <?php echo '<p class="commented-by">Commenting as: '.$this->session->userdata('username'). '</p>'; ?>
            <br>
            <textarea class="commentingbox" name="body"></textarea>
            <input type="hidden" name="food" value="meatballs";>
            <button type="submit" class="commentbutton">Comment</button>
            <?php echo form_close(); ?>
            <?php endif; ?>
            <h2>Comments</h2>
            <?php foreach($comments as $comment):
                if($comment['food'] == 'meatballs'){?>
                    <div class="comment">
                        <?php if($this->session->userdata('username') == $comment['username']) : ?>
                        <?php echo form_open('comments/delete/'.$comment['id']); ?>
                        <button type="submit" value="Delete" class="deletebutton">Delete</button>
                        <input type="hidden" name="food" value="meatballs";>
                        <?php echo form_close(); ?>
                <?php endif; ?>
                <div class="comment-box">
                    <h3>Commented by: <?php echo $comment['username']; ?></h3>
                    <p><?php echo $comment['comment']; ?></p>
                </div>
                </div>
            <?php } endforeach; ?>
        </div>
    </div>
</section>
