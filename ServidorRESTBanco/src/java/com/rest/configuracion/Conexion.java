package com.rest.configuracion;

import java.sql.Connection;
import java.sql.DriverManager;

public class Conexion {
    Connection conn;
    
    public Conexion(){
        try{
            conn = DriverManager.getConnection("jdbc:mysql://localhost/banco_aps?user=root&password=");
        }catch(Exception e){
           
        }
    }
    
    public Connection getConnection(){
        return conn;
    }
    
    public static void main(String[] args) {
        Conexion con = new Conexion();
        System.out.println(con.getConnection());
    }
}
