$(document).ready(function(){
            $("#inputNIP").keyup(function(){
                var ids=$("#inputNIP").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"nipvalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> NIP belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> NIP sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });


            $("#inputIDPoli").keyup(function(){
                var ids=$("#inputIDPoli").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"polivalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> ID Poli belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> ID Poli sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });

            $("#inputIDPasien").keyup(function(){
                var ids=$("#inputIDPasien").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"pasienvalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> No RM belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> No RM sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });

            $("#inputNIPPegawai").keyup(function(){
                var ids=$("#inputNIPPegawai").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"pegawaivalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> NIP belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> NIP sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });

            $("#inputIDUser").keyup(function(){
                var ids=$("#inputIDUser").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"uservalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> ID User belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> ID User sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });

            $("#inputIDSatuanKemasan").keyup(function(){
                var ids=$("#inputIDSatuanKemasan").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"kemasanvalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> ID Satuan Kemasan belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> ID Satuan Kemasan sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });

            $("#inputIDSatuan").keyup(function(){
                var ids=$("#inputIDSatuan").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"satuanvalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> ID Satuan belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> ID Satuan sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });

            $("#inputIDObat").keyup(function(){
                var ids=$("#inputIDObat").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"obatvalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> ID Obat belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> ID Obat sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });

            $("#inputIDPenyimpanan").keyup(function(){
                var ids=$("#inputIDPenyimpanan").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"penyimpanvalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> ID Penyimpanan belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> ID Penyimpanan sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });

            $("#inputIDSupplier").keyup(function(){
                var ids=$("#inputIDSupplier").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"suppliervalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> ID Penyimpanan belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> ID Penyimpanan sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });

            $("#id_permintaan").keyup(function(){
                var ids=$("#id_permintaan").val();
                 $("#messagewarning").html("checking...");            
              $.ajax({
                    type:"GET",
                    url:"permintaanvalidator/" + ids,
                        success:function(data){
                        if(data==0){
                            $("#messagewarning").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> ID Permintaan belum terdaftar di sistem</p>");
                        }
                        else{
                            $("#messagewarning").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> ID Permintaan sudah terdaftar di sistem</p>");
                        }
                    }
                 });
 
            });

            $(".inputDosis").keyup(function(){
                 $(this).closest('tr').find("input:not([name^=inputDosis][name^=inputCatatan])").each(function() {
                  var ids=$("#inputObat").val();
                  var idx=$("#inputDosis").val();
                  var idf=0;
                  $.ajax({
                    type:"GET",
                    url:"cekstokobat/" + ids,
                        success:function(data){
                          $("#messagewarning").html("<p style='color: blue;'><span class='glyphicon glyphicon-info-sign'></span> Stok obat yang tersedia: " + data + " satuan</p>");
                          if(idx >= parseInt(data)){
                              $("#messagewarning2").html("<p style='color: red;'><span class='glyphicon glyphicon-remove-sign'></span> Dosis yang dimasukkan melebihi stok yang tersedia</p>");
                          }
                          else{
                              $("#messagewarning2").html("<p style='color: green;'><span class='glyphicon glyphicon-ok-sign'></span> Dosis yang dimasukkan tidak melebihi stok yang tersedia</p>");                      
                          }
                    }
                 });
                  });
            });

            $(".inputCatatan").keyup(function(){
                 $(this).closest('tr').find("input:not([name^=inputDosis][name^=inputCatatan])").each(function() {
                      $("#messagewarning").html("");                                        
                  });
            });


         });