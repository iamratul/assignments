<div class="row g-5">
    <div class="col-md-8 offset-md-2">
        <article class="blog-post" id="blog-post">
            <h2 class="display-5 link-body-emphasis mb-1" id="post-title"></h2>
            <p class="blog-post-meta"><span id="post-created"></span> by <a href="#" id="post-user"></a></p>
            <img class="w-100 h-100 mb-3" src="" alt="Post Image" id="post-image">
            <p id="post-content"></p>
        </article>
    </div>
</div>

<script>
    getPostData();
    async function getPostData() {
            let response = await axios.get('/posts/${postId}');
            const post = response.data;

            // Render the post data on the page
            document.getElementById('post-title').textContent = post.title;
            document.getElementById('post-created').textContent = `Created: ${post.created_at}`;
            document.getElementById('post-user').textContent = `User: ${post.user.name}`;
            document.getElementById('post-image').setAttribute('src', post.image);
            document.getElementById('post-content').textContent = post.content;
    }
</script>