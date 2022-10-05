<?php
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);
    require 'header.php'; 
?>
    <main>
        <?php if (isset($_SESSION["username"])) {?>
            <section class="login">
                <div class="login-state">
                    <p>Hi <?= $_SESSION["username"] ?></p>
                </div>
                <div class="edit-post">
                    <p>Roll up your sleeves to write the best article you can! 💪 </p>
                    <form action="/includes/post.inc.php" method="post">
                        <input type="text" name="title-post" id="title_post" placeholder="write here the post title...">
                        <textarea name="body-post" id="body_post" cols="30" rows="10" placeholder="write here the article..."></textarea>
                        <button type="submit" name="edit-post" class="btn-f">Submit</button>
                    </form>
                </div>
            </section>
        <?php } ?>

        <?php  require './includes/index.inc.php'; ?>

        <?php if (!empty($arr_results)) { ?>

            <?php foreach($arr_results as $row) { ?>
                <article>
                    <h2><?= $row["title"] ?></h2>
                <div class="owner">
                    <span class="author"><?= $row["username"] ?></span>
                    <span class="time"><?= date('M j, Y', strtotime($row["created_at"])); ?></span>
                </div>
                    <p><?= $row["body"] ?></p>
                </article>
            <?php } ?>

        <?php } ?>

        <?php mysqli_close($conn); ?>

        <!-- <article>
            <h2>Deleting stuff</h2>
            <div class="owner">
                <span class="author">Karl11</span>
                <span class="time">July 06, 2022</span>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda alias, cupiditate quibusdam architecto quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus. Quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus.</p>
        </article> -->

        <!-- <article>
            <h2>-h-help -help???</h2>
            <div class="owner">
                <span class="author">Zodabolas</span>
                <span class="time">Apr 22, 2022</span>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda alias, cupiditate quibusdam architecto quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus. Quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus.</p>
        </article> -->
  
        <!-- <article>
            <h2>Never miss completion</h2>
            <span>March 28, 2022</span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda alias, cupiditate quibusdam architecto quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus. Quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus.</p>
        </article> -->
        <!-- <article>
            <h2>Diffing binarries</h2>
            <span>February 04, 2022</span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda alias, cupiditate quibusdam architecto quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus. Quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus.</p>
        </article>
        <article>
            <h2>Diffing binarries</h2>
            <span>February 04, 2022</span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda alias, cupiditate quibusdam architecto quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus. Quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus.</p>
        </article>
        <article>
            <h2>Diffing binarries</h2>
            <span>February 04, 2022</span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda alias, cupiditate quibusdam architecto quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus. Quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus.</p>
        </article> -->
        
    </main>
<?php 
    require 'footer.php';
?>