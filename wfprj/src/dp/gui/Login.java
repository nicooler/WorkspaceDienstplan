/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package dp.gui;

import dp.daba.DbCon;
import java.awt.Frame;
import java.awt.event.WindowAdapter;
import java.sql.*;
import javax.swing.JFrame;
import javax.swing.JLabel;
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
    
    Connection con;
    Statement st;
    ResultSet rs;
    
    // Frame erstellen
    JFrame f = new JFrame("User Login");
    JLabel l = new JLabel("Username:");
    JLabel l1 = new JLabel("Password:");
    JTextField t = new JTextField(10);
    JPasswordField p = new JPasswordField();
    
    
    public Login() {
        connect();
        frame();
    }

    public void connect()
    {
        try {
           con = getConnection();
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
        p.add()
    
    }
    private void initComponents() {

        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosing(java.awt.event.WindowEvent evt) {
                closeDialog(evt);
            }
        });

        pack();
    }                       

    /**
     * Closes the dialog
     */
    private void closeDialog(java.awt.event.WindowEvent evt) {                             
        setVisible(false);
        dispose();
    }                            

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                Login dialog = new Login(new Frame(), true);
                dialog.addWindowListener(new WindowAdapter() {
                    public void windowClosing(java.awt.event.WindowEvent e) {
                        System.exit(0);
                    }
                });
                dialog.setVisible(true);
            }
        });
    }       
}