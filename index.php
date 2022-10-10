<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
require 'header.php';
?>
<main id="app">

    <?php if (isset($_SESSION["username"])) { ?>
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



    <!-- <?php if (!empty($posts)) { ?>

            <?php foreach ($posts as $post) { ?>
                <article>
                    <h2><?= $post["title"] ?></h2>
                <div class="owner">
                    <span class="author"><?= $post["username"] ?></span>
                    <div class="post-creation">
                        <span class="time"><?= date('M j, Y', strtotime($post["created_at"])); ?></span>
                        <span class="time-ago">(1 minute ago)</span>
                    </div>
                </div>
                    <p><?= $post["body"] ?></p>
                </article>
            <?php } ?>

        <?php } ?> -->

        <!-- <p>Width:</p>
        <input type="number" name="" id="wid" v-model="width">
        <p>Height:</p>
        <input type="number" name="" id="hei" v-model="height">
        <p>Area: {{area}}</p> -->
    <article v-for="post in posts">
        <h2>{{post.title}}</h2>
        <div class="owner">
            <span class="author">{{post.username}}</span>
            <div class="post-creation">
                <span class="time">{{post.created_at}}</span>
                <span class="time-ago">{{post.formatted_time}}</span>
            </div>
        </div>
        <p>{{post.body}}</p>
    </article>

    <!-- <article>
            <h2>Deleting stuff</h2>
            <div class="owner">
                <span class="author">Karl11</span>
                <span class="time">July 06, 2022</span>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda alias, cupiditate quibusdam architecto quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus. Quis tempore magnam sapiente dolore voluptatem impedit atque praesentium sunt repudiandae nostrum aut accusantium expedita. Ab, delectus.</p>
        </article> -->
</main>


<script>
    
    new Vue({
        el: '#app',
        data: {
            posts: [],
            width: 100,
            height: 5,
        },
        methods: {
            getPosts: async function() {
                let tmp_posts = [];
                await axios.get('/api/getPosts.php').then(function (res) {
                    console.log("posts array? ", res.data)
                    return
                    tmp_posts = res.data
                })
                
                for (post of tmp_posts) {
                    post.formatted_time = timeago.format(post.created_at)
                }

                this.posts = tmp_posts
            }
        },
        computed: {
            area: function () {
                return this.width*this.height
            }
        },
        mounted() {
           this.getPosts()
        }
    })
</script>
<?php
require 'footer.php';
?>