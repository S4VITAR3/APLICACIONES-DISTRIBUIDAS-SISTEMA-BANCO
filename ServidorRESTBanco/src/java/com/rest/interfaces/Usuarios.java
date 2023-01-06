package com.rest.interfaces;

public class Usuarios {
    int numero_cuenta;
    String nombre;
    String apellido_paterno;
    String apellido_materno;
    String username;
    int nip;
    String rol;
    int estado;

    public Usuarios() {
    }

    public Usuarios(int numCuenta, String nombre, String apellido_pa, String apellido_ma, String userName, int nip, String rol, int estado) {
        this.numero_cuenta = numCuenta;
        this.nombre = nombre;
        this.apellido_paterno = apellido_pa;
        this.apellido_materno = apellido_ma;
        this.username = userName;
        this.nip = nip;
        this.rol = rol;
        this.estado = estado;
    }

    public int getNumero_cuenta() {
        return numero_cuenta;
    }

    public void setNumero_cuenta(int numero_cuenta) {
        this.numero_cuenta = numero_cuenta;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido_paterno() {
        return apellido_paterno;
    }

    public void setApellido_paterno(String apellido_paterno) {
        this.apellido_paterno = apellido_paterno;
    }

    public String getApellido_materno() {
        return apellido_materno;
    }

    public void setApellido_materno(String apellido_materno) {
        this.apellido_materno = apellido_materno;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public int getNip() {
        return nip;
    }

    public void setNip(int nip) {
        this.nip = nip;
    }

    public String getRol() {
        return rol;
    }

    public void setRol(String rol) {
        this.rol = rol;
    }

    public int getEstado() {
        return estado;
    }

    public void setEstado(int estado) {
        this.estado = estado;
    }

    
    
    
    
}
