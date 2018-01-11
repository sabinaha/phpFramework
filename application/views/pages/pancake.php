<section>
    <!-- Printar all xml beroende på titel -->
    <?php print_xml (lcfirst($title)); ?>
    <div class="right">
        <div class="comments">
            <?php if($this->session->userdata('logged_in')) : ?>
            <?php echo validation_errors(); ?>
            <?php echo form_open('comments/create'); ?>
            <?php echo 'Commenting as: '.$this->session->userdata('username'); ?>
            <textarea class="commentingbox" name="body"></textarea>
            <input type="hidden" name="food" value="pancake";>
            <button type="submit" class="commentbutton">Comment</button>
            <?php echo form_close(); ?>
             <?php endif; ?>
            <h2>Comments:</h2>
            <?php foreach($comments as $comment):
                 if($comment['food'] == 'pancake'){?>
            <div class="comment">
                <?php if($this->session->userdata('username') == $comment['username']) : ?>
                <?php echo form_open('comments/delete/'.$comment['id']); ?>
                <button type="submit" value="Delete" class="deletebutton">Delete</button>
                <input type="hidden" name="food" value="pancake";>
                <?php echo form_close(); ?>
                <?php endif; ?>
                <h3 class="commentusername"><?php echo $comment['username']; ?></h3>
                <p><?php echo $comment['comment']; ?></p>
            </div>
            <?php } endforeach; ?>
        </div>
    </div>
</section>
