/**
 * Created by julien.zhang on 2014/9/11.
 *
 * 封装html5 requestFileSystem;
 *
 */

function fs() {

    var _getFs = function (type, size) {

        type = type || window.TEMPORARY;

        size = size || 5 * 1024 * 1024;

        var fs = getFs.fs = getFs.fs || window.requestFileSystem || window.webkitRequestFileSystem;

        return $.Deferred(function (deferred) {

            fs(type, size, function (fs) {
                deferred.resolve(fs);
            }, function (err) {
                deferred.reject(err);
            });

        });
    };


    var writeFile = function (name) {

        name = name || (+new Date).toString(36);

        return _getFs(type, size).done(function (fs) {


            return fs.root.getFile(name, {create: true, exclusive: true}, function (fileEntry) {


                fileEntry.createWriter(function (fileWriter) {

                    fileWriter.onwriteend = function (e) {
                        console.log('Write completed.');
                    };

                    fileWriter.onerror = function (e) {
                        console.log('Write failed: ' + e.toString());
                    };

                });

            }, function (err) {

            });


        }).fail(function (err) {


        });

    };




    return {
        writeFile: writeFile
    };


}