/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package dp.app;

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

import dp.gui.Login;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;
import java.awt.Frame;

public class Start {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try { // Set System L&F            
                UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
            }
            catch (UnsupportedLookAndFeelException | ClassNotFoundException | InstantiationException | IllegalAccessException e) {}
       
       
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Login(new Frame(), true).setVisible(true);
            }
        });
    }
}