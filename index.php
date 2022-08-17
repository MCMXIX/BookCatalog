<!DOCTYPE html>
<html>
    <head>
        <!-- STYLES !-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        
        <title> Book Catalog </title>
    </head>
    <body>
        <div class="container m-5">
            <div>
                <div class="d-flex justify-content-center w-100">
                    <div class="w-100 text-center">
                        <p class="emptyTable"> No Books has been added yet. </p>
                    </div>
                    <button class="btn btn-success ml-auto" data-bs-toggle="modal" data-bs-target="#createModal"> ADD </button>
                </div>
                <table class="table table-bordered mt-2" id="booksTable">
                    <thead>
                        <tr>
                            <th scope="col">TITLE</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">AUTHOR</th>
                            <th scope="col">PUBLISHER</th>
                            <th scope="col">YEAR PUBLISHED</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="template" hidden>
                            <td scope="row">1</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-secondary">EDIT</button>
                                <button type="button" class="btn btn-secondary deleteBtn" id="deleteBtn">DELETE</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalFields" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalFields">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="title" class="form-label">Title</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="title" aria-describedby="basic-addon3">
                            </div>
                            <label for="isbn" class="form-label">ISBN</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="isbn" aria-describedby="basic-addon3">
                            </div>
                            <label for="author" class="form-label">AUTHOR</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="author" aria-describedby="basic-addon3">
                            </div>
                            <label for="publisher" class="form-label">PUBLISHER</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="publisher" aria-describedby="basic-addon3">
                            </div>
                            <label for="year_published" class="form-label">YEAR PUBLISHED</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" step="1" value="2022" id="year_published" aria-describedby="basic-addon3">
                            </div>
                            <label for="category" class="form-label">CATEGORY</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="category" aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" id="submitBtn">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="./js/book.js"></script>
</html>
