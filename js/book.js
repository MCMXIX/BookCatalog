$(() => {    
    /**
     * bookJs
     * @var object
     */
    let bookJs = {
        /**
         * @var array
         */
        aBookList : [],

        /**
         * initialize the script
         */
        init() {
            this.getBooks();
            this.initEventLisners();
        },

        /**
         * add event listners
         */
        initEventLisners() {
            $('#submitBtn').click(() => {
                this.addBook();
            });

            $('#booksTable').on('click', '.deleteBtn', (oEvent) => {
                bookJs.deleteBook(oEvent.target.dataset.deleteId);
                $(oEvent.target).parents('tr').remove();
            });
        },

        /**
         * send request to retrieve books in the backend
         */
        getBooks() {
            $.ajax({
                type: 'POST',
                url: 'classes/BookController.php',
                data: {
                    action: 'getBooks'
                },
                success: (oResponse) => {
                    aData = JSON.parse(oResponse);
                    bookJs.aBookList = aData;
                    bookJs.populateTableData(aData);
                }
            })
        },

        /**
         * populateTableData
         * @param { array } aBookList 
         */
        populateTableData(aBookList) {
            let oTable = $('#booksTable');
            $('#usersTable').find('tbody > tr[class!="template"]').remove();
            if (aBookList.length < 1) {
                $('.emptyTable').attr('hidden', false);
            } else {
                oTable.removeAttr('hidden');
                $('.emptyTable').attr('hidden', true);

                $.each(aBookList, function(iKey, oValue) {
                    let oRow = $('.template').clone().prop('hidden', false);
                    oRow.removeAttr('class');
                    oRow.find('td[scope="row"]').text(oValue.title);
                    oRow.find('td[scope="row"]').next().text(oValue.isbn);
                    oRow.find('td[scope="row"]').next().next().text(oValue.author);
                    oRow.find('td[scope="row"]').next().next().next().text(oValue.publisher);
                    oRow.find('td[scope="row"]').next().next().next().next().text(oValue.year_published);
                    oRow.find('td[scope="row"]').next().next().next().next().next().text(oValue.category);
                    oRow.find('#deleteBtn').attr('data-delete-id', oValue.id);
                    oTable.find('tbody').append(oRow);
                });
            }
        },

        /**
         * add new book
         */
        addBook() {
            let oNewBook = {
                title: $('#title').val(),
                isbn: $('#isbn').val(),
                author: $('#author').val(),
                publisher: $('#publisher').val(),
                year_published: $('#year_published').val(),
                category: $('#category').val()
            };

            $.ajax({
                type: 'POST',
                url: 'classes/BookController.php',
                data: {
                    action: 'addNewBook',
                    book: oNewBook
                },
                success: (sResponse) => {
                    bookJs.populateTableData([oNewBook]);
                    bookJs.toggleCreateModal();
                    alert(sResponse);
                }
            });
        },

        /**
         * toggle the create modal
         */
        toggleCreateModal() {
            $('#createModal').modal('toggle');
        },
        
        /**
         * delete the book
         * @param { string } sDeleteId 
         */
        deleteBook(sDeleteId) {
            $.ajax({
                type: 'POST',
                url: 'classes/BookController.php',
                data: {
                    action: 'deleteBook',
                    id : sDeleteId
                },
                success: (sResponse) => {
                    alert(sResponse);
                }
            });
        }
    }

    bookJs.init();
});
