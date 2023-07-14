@extends('app')
@section('content')
    {{-- All post --}}
    <div class="row mb-2">
        <div class="col-md-12">
            <h1>Featured Post</h1>
        </div>
    </div>
    <div class="row mb-2" id="blog-post">
        {{-- Single Post --}}
    </div>
    {{-- End All post --}}

    <script>
        getPost();
        async function getPost() {
            try {
                let url = "/postsData";
                // Loader Show Content Hide
                document.getElementById('loading-div').classList.remove('d-none');
                document.getElementById('content-div').classList.add('d-none');

                let result = await axios.get(url);

                result.data.forEach(async(item) => {
                    let formattedDate = moment(item['created_at']).format('D MMM, YYYY - h:mm a');
                    let categoryNames = item.categories.length > 0 ? item.categories[0].name : 'No Category';
                    let truncatedContent = truncateText(item['content'],
                        250); // Specify the maximum content length
                    let postLink = `/posts/${item['id']}`; // Modify this line to generate the correct URL
                    // Fetch the user details for the post
                    let userResponse = await axios.get(`/users/${item.id}`);
                    let user = userResponse.data;

                    document.getElementById('blog-post').innerHTML += (`
                    <div class="col-md-6">
                        <div class="row g-0 border rounded overflow-hidden mb-4 shadow-sm position-relative">
                            <div class="col-lg-8 p-4 d-flex flex-column position-static">
                                <a href="${ item['link'] }"><strong
                                        class="d-inline-block mb-2 text-primary-emphasis">${ categoryNames }</strong></a>
                                <h3 class="mb-0">${ item.title }</h3>
                                <div class="mb-1 text-body-secondary">${ formattedDate } by <a href="#">${user.name}</a></div>
                                <p class="card-text mb-auto">${ truncatedContent }</p>
                                <a href="${ postLink }" class="icon-link gap-1 icon-link-hover continue-reading-btn">
                                    Continue reading
                                </a>
                            </div>
                            <div class="col-lg-4 d-none d-lg-block">
                                <img class="w-100 h-100" src="${ item['image'] }" alt="Post Image">
                            </div>
                        </div>
                    </div>
                    `);
                });
                // Loader Hide Content Show
                document.getElementById('loading-div').classList.add('d-none');
                document.getElementById('content-div').classList.remove('d-none');

                // Add event listeners to the "Continue reading" buttons
                const continueReadingBtns = document.querySelectorAll('.continue-reading-btn');
                continueReadingBtns.forEach((btn) => {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();
                        const postLink = btn.getAttribute('href');
                        // Redirect to the post's detail page
                        window.location.href = postLink;
                    });
                });
            } catch (error) {
                alert(error);
            }
        }

        function truncateText(text, maxLength) {
            if (text.length > maxLength) {
                return text.substring(0, maxLength) + '...';
            }
            return text;
        }
    </script>
@endsection
