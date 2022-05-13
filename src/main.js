async function uploadMessage() {
    //values 


    const title = document.querySelector('.title').value;

    // const post = document.querySelector('.title').value;
    const body = document.querySelector('.body').value;
    const author = document.querySelector('.author').value;
    const category = document.querySelector('.cat').value;

    if (title === null || body === null || author === null || category === null) {
        alert('Please Enter something..')
        return false
    }



    await fetch('api/post/create.php', {
        method: "POST",
        body: JSON.stringify({
            title: title,
            body: body,
            author: author,
            category: category
        })

    })


    // document.querySelector('.success_div').innerHTML = '<h3>Post Created!!</h3>'

    document.querySelector('.success_div').innerHTML = setTimeout(function() {
        document.querySelector('.success_div').innerHTML = '<h3>Post Created!!</h3>'
    }, 3000);





}

async function fetchPosts() {
    const response = await fetch('api/post/getPosts.php');
    await response.json().then(
        post => {
            let op = '';
            for (let i in post) {
                if (post[i] == null) {
                    op += "no posts";
                } else {
                    op += `
                        <div class="card card-body p-4 m-1">
                                <h4>Title: ${post[i].title}</h4>
                                <h5>Author: ${post[i].author}</h5>
                                <h5>
                                    Category: ${post[i].c_name}
                                </h5>
                                <div class="collapse"  id="collapseExample${post[i].p_id}">
                                    <h4>Post:</h4>
                                    <div class="card card-body border-0 m-3">
                                        ${post[i].body}
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm " style="width:fit-content" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample${post[i].p_id}" aria-expanded="false" aria-controls="collapseExample">
                                    View Full Post
                                </button>

                        </div>
                    `;
                }
            }
            document.getElementById('post-box').innerHTML = op;
        })
}