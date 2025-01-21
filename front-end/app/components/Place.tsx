import { Heart, HomeIcon, MapIcon, PlaneIcon, User, Users } from "lucide-react"
import { motion } from "motion/react"


export const Place = () => {
    return (
        <motion.div initial={{ y: -35, opacity: 0 }} animate={{ y: 0, opacity: 1 }} className="flex flex-col gap-2 relative">
            <img className="w-[25rem] h-[25rem] rounded-xl" src="https://www.aarquiteta.com.br/blog/wp-content/uploads/2022/01/como-construir-uma-piscina-residencial-2.jpg"/>
            <Heart className="absolute right-4 top-4 cursor-pointer" color="#fff" fill="#666"/>
            <p className="absolute left-4 top-4 bg-[#f66151]/90 px-4 py-1 rounded-xl font-medium text-white">Reservas lotadas</p>
            <div className="flex flex-col gap-1">
                <div className="flex items-center gap-2">
                    <HomeIcon/>
                    <p className="text-lg font-semibold">Piscina Residencial</p>
                </div>

                <div className="flex items-center gap-2">
                    <Users />
                    <p>20 Pessoas</p>
                </div>
            </div>
        </motion.div>
    )
}