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
                        <div style="margin-left:auto">
                            <button class="btn btn-primary rounded-5" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" >edit</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form>
                                 
                                  <div class="mb-3">
                                     
                                      <input type="text" class="form-control" 
                                      value="${post[i].title}">
                                    </div>
                                 
                                    <div class="mb-3">
                                      <label for="body-text" class="col-form-label">Body:</label>
                                      <textarea class="form-control" cols="30" rows="10" id="body-text">
                                      ${post[i].body}
                                      </textarea>
                                    </div>

                                    <div class="mb-3">
                                     <label for="author-name" class="col-form-label">Author:</label>
                                     <input type="text" class="form-control" id="author-name" value="${post[i].author}">
                                  </div>

                                  <div class="mb-3">
                                  <option class="text-center"> ${post[i].c_name}</option>
                                    <select class="cat form-control" id="edit-opt" name="category">
                                            
                                            ${getCategories()}
                                       
                                    </select>
                                
                                
                                </div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        <a class="btn btn-danger rounded-5" style="width:fit-content">delete</a>    
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
                      </div>
                                
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


async function getCategories() {
    const response = await fetch('api/category/getCategories.php')
    await response.json()
        .then(category => {
            let op = '';
            for (let i in category) {
                if (category[i] == null) {
                    op += "<option>no category</option>";
                } else {
                    op += `
                            <option class="form-control" value="${category[i].c_id}">
                                ${category[i].c_name}
                            </option>
                    `
                }
            }
            document.getElementById('edit-opt').innerHTML = op
        })

}


async function updatePost() {
    const title = document.querySelector('.e-title').value;

    // const post = document.querySelector('.title').value;
    const body = document.querySelector('.e-body').value;
    const author = document.querySelector('.e-author').value;
    const category = document.querySelector('.e-cat').value;
    await fetch('api/post/update.php', {
        method: "POST",
        body: JSON.stringify({

        })
    })
}