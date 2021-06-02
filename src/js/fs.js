/**
 * Created by julien.zhang on 2014/9/11.
 *
 * 封装html5 requestFileSystem;
 *
 */

function fs() {

    var requestFileSystem = function (type, size) {

        type = type || window.TEMPORARY;

        size = size || 5 * 1024 * 1024;

        var fs = requestFileSystem.fs = requestFileSystem.fs || window.requestFileSystem || window.webkitRequestFileSystem;

        return $.Deferred(function (deferred) {

            fs(type, size, function (fs) {
                deferred.resolve(fs);
            }, function (err) {
                deferred.reject(err);
            });

        });
    };


    var getFileEntry = function (fs) {

        return $.Deferred(function (def) {

            fs.root.getFile(name, {create: true, exclusive: true}, function (fileEntry) {

                def.resolve(fileEntry);
            }, function (err) {
                def.reject(err);
            });

        });

    };


    var createWriter = function (fileEntry) {

        return $.Deferred(function (def) {

            fileEntry.createWriter(function (fileWriter) {
                def.resolve(fileWriter);
            }, function (err) {
                def.reject(err);
            })

        });

    };


    var _writeFile = function (fileWriter) {

        fileWriter.onwriteend = function (e) {
            console.log('Write completed.');
        };

        fileWriter.onerror = function (e) {
            console.log('Write failed: ' + e.toString());
        };

        var blob = new Blob([content], {type: type});

        //fileWriter.write();

        return fileEntry.toURL()

        return URL.createObjectURL(blob);

    };


    var writeFile = function (name, content, type) {

        name = name || (+new Date).toString(36);

        content = content || name;

        type = type || 'text/plain;charset=utf-8';


    };




return {
    writeFile: writeFile
};


}