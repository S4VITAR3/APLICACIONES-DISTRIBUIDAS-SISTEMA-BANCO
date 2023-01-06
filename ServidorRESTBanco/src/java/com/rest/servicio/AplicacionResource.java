package com.rest.servicio;

import com.rest.capadatos.UsuariosDAO;
import com.rest.interfaces.Usuarios;
import java.util.List;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.MediaType;


@Path("Aplicacion")
public class AplicacionResource {

    UsuariosDAO usuario = new UsuariosDAO();    
    @GET
    @Path("login")
    @Produces(MediaType.APPLICATION_JSON)
    public List<Usuarios> login(@QueryParam("no_cuenta")int no_cuenta,@QueryParam("nip") int nip){
        return usuario.login(no_cuenta, nip);
    }
    
    @GET
    @Path("agregarUsuario")
    public boolean agregarUsuario(@QueryParam("numCuenta") int numCuenta, @QueryParam("nombre") String nombre, 
            @QueryParam("apellido_pa") String apellido_pa, @QueryParam("apellido_ma") String apellido_ma, @QueryParam("username") String username,
            @QueryParam("nip") int nip, @QueryParam("rol") String rol){
        return usuario.agregarUsuario(numCuenta, nombre, apellido_pa, apellido_ma, username, nip, rol);
        //?numCuenta=1234567891&nombre=Luis&apellido_pa=Lopez&apellido_ma=Gonzalez&username=Luis23&nip=12345&rol=Cliente
    }
    
    @GET
    @Path("depositarNuevoUsuario")
    public boolean depositarNuevoUsuario(@QueryParam("numCuenta") int numCuenta, @QueryParam("cantidad") double cantidad){
        return usuario.depositarUsuarioNuevo(numCuenta,cantidad);
    }
    
    @GET
    @Path("consultarSaldo")
    public double consultarSaldo(@QueryParam("numCuenta") int numCuenta){
        return usuario.consultarSaldo(numCuenta);
    }
    
    @GET
    @Path("retirarSaldo")
    public boolean retirarSaldo(@QueryParam("numCuenta")int numCuenta, @QueryParam("saldo") double saldo){
        return usuario.retirarSaldo(numCuenta, saldo);
    }
    
    @GET
    @Path("realizarTransferencia")
    public boolean realizarTransferencia(@QueryParam("remitente") int remitente, @QueryParam("destinatario") int destinatario,
            @QueryParam("monto") double monto){
        return usuario.realizarTransferencia(remitente, destinatario, monto);
    }
    
    @GET
    @Path("listarUsuarios")
    public List<Usuarios> listarUsuarios(){
        return usuario.listarUsuarios();
    }
    
    
}
