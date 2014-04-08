/*
 * Erstellt von Dominik Witka am 02.04.2014
 * 
 */

package Dienstplan;


import java.awt.EventQueue;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Vector;



import javax.swing.Box.Filler;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JList;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.ScrollPaneConstants;
import javax.swing.JButton;
import javax.swing.event.ListSelectionListener;
import javax.swing.event.ListSelectionEvent;
import javax.swing.table.TableModel;
import javax.swing.table.DefaultTableModel;

import java.sql.*;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

import javax.swing.JTextField;

import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;

import javax.swing.JTable;


import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

import javax.swing.ListSelectionModel;


   


public class SearchEmp extends JTable{

	
	private JTextField txtName;
	static ResultSet result;
	static ResultSet rs;
	private javax.swing.JTable tableEmp;
	
	
	private javax.swing.JScrollPane jScrollPane1;
    private JTable jTable1;
	
	
	public SearchEmp() {
		initialize();
		
	}


	private void initialize() 
	{
		final JFrame searchframe = new JFrame();
		searchframe.setVisible(true);
        searchframe.setTitle("Suche Mitarbeiter");
        searchframe.setSize(1004, 549);
        JPanel panel = new JPanel();
        panel.setLayout(null);
             
        searchframe.getContentPane().add(panel);
        
        final JButton btnbernehmen = new JButton("Suchen");
        btnbernehmen.addActionListener(new ActionListener() {
        	public void actionPerformed(ActionEvent arg0) {
        		customerlist();
        	}
        });
        btnbernehmen.addMouseListener(new MouseAdapter() {
        	public void mouseReleased(MouseEvent arg0) {
        		
        	}
        });
        btnbernehmen.setBounds(364, 35, 121, 23);
        panel.add(btnbernehmen);
        
        txtName = new JTextField();
        txtName.addKeyListener(new KeyAdapter() {
			@Override
			public void keyReleased(KeyEvent e) {
				if(e.getKeyChar() == KeyEvent.VK_ENTER) {
					customerlist();
				}
			}
		});
        txtName.setBounds(152, 36, 145, 20);
        panel.add(txtName);
        txtName.setColumns(10);
        
        JScrollPane scrollPane_1 = new JScrollPane();
        scrollPane_1.setVerticalScrollBarPolicy(ScrollPaneConstants.VERTICAL_SCROLLBAR_AS_NEEDED);
        scrollPane_1.setHorizontalScrollBarPolicy(ScrollPaneConstants.HORIZONTAL_SCROLLBAR_NEVER);
        scrollPane_1.setBounds(32, 67, 905, 402);
        panel.add(scrollPane_1);
        
        tableEmp = new JTable();
        scrollPane_1.setViewportView(tableEmp);

        
        tableEmp.setSelectionMode( ListSelectionModel.MULTIPLE_INTERVAL_SELECTION );
        
        
        
        JButton btnNewButton = new JButton("Zur\u00FCck");
        btnNewButton.addActionListener(new ActionListener() {
        	public void actionPerformed(ActionEvent arg0) {
				searchframe.setVisible(false);
				Main main;
				try {
					main = new Main();
					main.setVisible(true);
				} catch (SQLException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
        	}
        });
        btnNewButton.setBounds(29, 480, 107, 23);
        panel.add(btnNewButton);
        
        JButton btnAccept = new JButton("Weiter");
        btnAccept.addMouseListener(new MouseAdapter() {
        	public void mouseReleased(MouseEvent arg0) 
        	{		
        		if (tableEmp.getSelectedRow() != -1)
        		{
        			int id = Integer.parseInt(tableEmp.getValueAt(tableEmp.getSelectedRow(),0) +"");


        			// zum fenster wechseln in dem der ma bearbeitet wird
        			MAverwalten ma ;
    				ma = new MAverwalten(id);
    				ma.setVisible(true);
    				setVisible(false);
					
        		}
        		else
        		{
        			JOptionPane.showMessageDialog(null, "Bitte wähle einen Mitarbeiter", "Information", JOptionPane.INFORMATION_MESSAGE);
        		}
        	}
        });
        btnAccept.setBounds(149, 480, 89, 23);
        panel.add(btnAccept);
        
        JLabel lblName = new JLabel("Nachname:");
        lblName.setBounds(71, 39, 71, 14);
        panel.add(lblName);
        
	}


	public void keyReleased(KeyEvent e) {
		if(e.getKeyChar() == KeyEvent.VK_ENTER) {
			customerlist();
		}
	}
	

	public void customerlist() 
	{		
		try{
			DatabaseConnection.getConnection();
			java.sql.Statement st = DatabaseConnection.st;
			
			String name =txtName.getText()+"%";
			String sql="";
			
			if(name.equals("%"))
			{
				sql = "SELECT MA_Id, Vorname, Nachname, GebDatum, Beschaeftigungsgrad FROM Mitarbeiter;";
			}
			else if(!name.equals("%")  )
			{
				sql = "SELECT MA_Id, Vorname, Nachname, GebDatum, Beschaeftigungsgrad FROM Mitarbeiter WHERE Nachname like '"+name+"';";
			}
			
			
			rs = st.executeQuery(sql);
			java.sql.ResultSetMetaData md= rs.getMetaData();
			
			int columns = md.getColumnCount();
			
			DefaultTableModel model = new DefaultTableModel();
			this.tableEmp.setModel(model);
			
            //  Get column names
            for (int i = 1; i <= columns; i++) {
                model.addColumn(md.getColumnLabel(i));
            }
            //  Get row data
            while (rs.next()) {
               	Object[] rows = new Object[columns];

                for (int i = 0; i < columns; i++) {
                	rows[i] = rs.getObject(i+1);
                }
                model.addRow(rows);
            }
            this.tableEmp.setModel(model);
            this.tableEmp.updateUI();
            rs.close();
            st.close();
            
            for (int i = 0; i <= tableEmp.getRowCount(); i++)
            {
            	for (int j = 0; j <= 8; j++) 
            	{
            		tableEmp.isCellEditable(i, j);            		
            	}
            }
//            UNBDINGT DIE EDITIERBARKEIT ÄNDERN!!!!
            
		}
		catch(Exception e)
		{
			
		}

	}

	public boolean isCellEditable(int rowIndex, int colIndex)
	{
		return false;
	}
	
	public void setVisible(boolean b) 
	{

	}
}
