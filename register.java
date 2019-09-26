import java.util.ArrayList;
import java.util.Map;
import java.util.Scanner;

public class cashRegister {
    private double totalPrice;
    public cashRegister() {
    }
    public void setGrandTotal(double total) {
		this.totalPrice = total;
	}
    public double getGrandTotal() {
		System.out.println(totalPrice);
		return this.totalPrice;
    }
    
}