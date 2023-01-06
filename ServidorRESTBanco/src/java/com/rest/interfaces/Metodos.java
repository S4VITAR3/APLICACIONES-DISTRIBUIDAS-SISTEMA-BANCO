package com.rest.interfaces;

import java.util.List;

public interface Metodos {
    public List<Usuarios> login(int no_cuenta, int nip);
    public boolean retirarSaldo(int numcuenta, double cantidad);
    public boolean agregarUsuario(int numCuenta,String nombre,String apellido_pa,String apellido_ma,String username,int nip,String rol);
    public boolean depositarUsuarioNuevo(int numCuenta, double cantidad);
    public double consultarSaldo(int numCuenta);
    public boolean realizarTransferencia(int remitente, int destinatario, double monto);
    public List<Usuarios> listarUsuarios();
    
}
