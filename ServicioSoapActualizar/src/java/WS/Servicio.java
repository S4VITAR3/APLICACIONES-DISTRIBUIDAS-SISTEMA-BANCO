/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import CapaDatos.Consultas_MYSQL;
import CapaDatos.Metodos;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author Jonathan
 */
@WebService(serviceName = "Servicio")
public class Servicio {

    Consultas_MYSQL method = new Consultas_MYSQL();
    
    @WebMethod(operationName = "update")
    public Boolean update(@WebParam(name = "numero_cuenta") int numero_cuenta, @WebParam(name = "nombre") String nombre, @WebParam(name = "apellido_paterno") String apellido_paterno, @WebParam(name = "apellido_materno") String apellido_materno, @WebParam(name = "username") String username, @WebParam(name = "nip") int nip) {
        return method.update(numero_cuenta, nombre, apellido_paterno, apellido_materno, username, nip);
    }
}
