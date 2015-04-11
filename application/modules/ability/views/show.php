            <?php //echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal', 'autocomplete' => 'off')); ?>
                <?php //print_r($abilities); ?>
                <?php foreach ($abilities as $ability): ?>
                    <div class="form-actions">
                    
                    <!-- foreach ability as current.abilility -->
                    <h3><span class="ability-name"><?php echo $ability->name;?></span></h3>
                    <p><span class="ability-description"><?php echo $ability->description;?></span></p>
                    <p>Rating: <span class="abiltiy-rating"><?php echo $ability->rating;?></span></p>
                    <p><span class="abiltiy-active"><?php echo $ability->active;?></span></p>
                </div>
                <?php endforeach ?>
            <?php //echo form_close(); ?>