/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package dp.gui;

import dp.daba.DbCon;
import static dp.daba.DbCon.getConnection;
import java.awt.Frame;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowListener;
import java.sql.*;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;


/**
 * @date 02.04.2014
 * @author Damian Wysocki
 * @version
 */

/**
 * User Story Nr. []:
 *  
 * (  Story Points)
 */



public class Login{
    
    // Parameter für SQL Querys
    Connection con;
    Statement st;
    ResultSet rs;
    
    // Variablen für Frame
    JFrame f = new JFrame("User Login");
    JLabel l = new JLabel("Username:");
    JLabel l1 = new JLabel("Password:");
    JTextField t = new JTextField(10);
    JPasswordField p = new JPasswordField();
    
    
    public Login() {
       
        // Methoden für Login Frame und Verbindung zur Datenbank
        connect();
        frame();
    }
    
    
    
    public void connect()
    {
        try {
           con = getConnection();
           //rs
           //st
        } catch (Exception e) {
            
        }
    
    }
    
    public void frame()
    {
        f.setSize(600,400);
        f.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        f.setVisible(true);
        
        JPanel p = new JPanel();
        
        p.add(l);
        p.add(t);
        p.add(l1);
        p.add(p);
    
    }
                 

    /**
     * Closes the dialog
     */
//    private void closeDialog(java.awt.event.WindowEvent evt) {                             
//        setVisible(false);
//        dispose();
//    }                            

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
       
            }
       
    }       
